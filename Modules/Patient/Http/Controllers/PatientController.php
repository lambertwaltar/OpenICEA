<?php

namespace Modules\Patient\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Patient\Entities\Patient;
use Modules\Patient\Entities\Country;
use Modules\Patient\Entities\District;
use Modules\Patient\Entities\Religion;
use Modules\Patient\Entities\Tribe;
use Modules\Patient\Entities\County;
use Modules\Patient\Entities\Subcounty;
use Modules\Patient\Entities\Parish;
use Modules\Patient\Entities\Village;
use Modules\Patient\Entities\FileData;
use Modules\Patient\Entities\Phonedetail;
use Modules\Patient\Entities\Encounter;
use Modules\Patient\Entities\Triage;
use Modules\Patient\Entities\DSDMType;
use Carbon\Carbon;
use DB,Log,Validator;

class PatientController extends Controller
{
    
    //apply middleware to constructor
    public function __construct(){   
        $this->middleware(['auth', 'is_locked_out', 'is_approved']);
        // $this->middleware(['auth', 'is_locked_out', 'is_approved', 'permission:view clients|add clients|edit clients|delete clients'])->except('index');
    }
    public function enrolmentHistory()
    {
        $data = Patient::select('RegistrationDate','IDCNO','FirstName','Surname','FollowUpStatus')->where('IDCNO', request()->idcno)->get();
        return view('patient::registry.enrolmenthistory', compact('data'));
    }
    public function searchClient()
    {
        $data = Patient::with(['countryy', '_district', '_county', '_subcounty', '_parish', '_village', '_kccaclinic', '_religion', '_tribe', '_filedata','phones', 'encounters','encounters.encounterreason'])->where('IDCNO', request()->id)->get();
        // $triage = Triage::select()->where('Patient', request()->id)->get();
        // $data->push($triage);
       // Log::info($data);
        return response()->json($data);
    }

    public function index() //show patients
    {
        //$clients = Patient::with('countryy')->get();
        return view('patient::registry.home');
    }

    public function list() //show patients
    {
        $clients = Patient::with('countryy')->get();
        return view('patient::registry.list', compact('clients'));
    }
    public function newClientForm()
    {
        $countries = Country::with('districts')->get();
        $religions = Religion::all();
        $tribes = Tribe::all();
        return view('patient::registry.newclient', compact('countries','religions','tribes'));
    }

    public function clientFileData($client)
    {
        request()->validate(['patientimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120', ]);
        if ($files = request()->file('patientimage')) 
        {
            $extension = $files->getClientOriginalExtension(); // getting image extension
            $filename =$client->IDCNO.'.'.$extension;
            $files->move('uploads', $filename);
            if(request()->imageid){
                $filedata= FileData::find(request()->imageid);
            }
            else{
                $filedata= new FileData();
            }
            $filedata->FileName= 'uploads/'.$filename;
            $filedata->fdpatient()->associate($client);
            $filedata->save();

        }
    }

    public function savePhone()
    {  
        request()->validate(['phonenumber' => 'numeric|size:10']);
        // Save In Database
        $phone= new Phonedetail();
        $phone->PhoneNumber=request()->phone;
        $phone->Description=request()->phonedescription;
        $phone->Relationship=request()->relationship;
        $phone->SelfContact=request()->personalcontact;
        $phone->FirstName=request()->firstname;
        $phone->Surname=request()->surname;
        $phone->CanBeContacted=request()->contactperson;
        $phone->HaveDisclosed=request()->disclosedperson;
        $phone->TamaNumber=request()->tamaphonenumber;
        $phone->TAMACategory=request()->tamacategoty;
        $phone->save();
    }

    public function deletePhone()
    {
         $data = Phonedetail::destroy(request()->id);
    }

    public function getPhone()
    {
        $data = DB::table('PhoneDetails')->latest('OID')->first();
        return response()->json($data);
    }

    public function createClient()
    {   
 
        $client = new Patient;
        $client->RegistrationDate = Carbon::now();
        $client->FirstName = request()->firstname;
        $client->Surname = request()->surname;
        $client->Initial = self::generateInitials(request()->surname.' '.request()->firstname);
        $client->BirthDate =request()->dob;
        $client->Gender =request()->gender;
        $client->MaritalStatus =request()->maritalstatus;
        $client->Religion =request()->religion;
        $client->Street =request()->street;
        $client->Zone =request()->zone;
        $client->LandLord =request()->landlord;
        $client->ProminentLeader =request()->prominentleader;
        $client->CommonName =request()->commonname;
        $client->NeighbourFeature =request()->neighbour;
        $client->IDIStaffIndentification =request()->IDIStaffIndentification;
        $client->OtherIDIStaffIndentification =request()->otherIDIStaffIndentification;
        $client->ProblemWithVisting =request()->visitingproblem;
        $client->DetailedDirection =request()->detaileddirection;

        //relationships 
        $client->countryy()->associate(Country::find(request()->country));
        $client->_tribe()->associate(Tribe::find(request()->tribe));
        $client->_district()->associate(District::find(request()->district));
        $client->_county()->associate(County::find(request()->county));
        $client->_subcounty()->associate(Subcounty::find(request()->subcounty));
        $client->_parish()->associate(Parish::find(request()->parish));
        $client->_village()->associate(Village::find(request()->village));
        $client->save();
        if(request()->file('patientimage')){
            self::clientFileData($client);
        }
        
        toastr()->success('client Details Saved. IDCNO: '.$client->IDCNO.' Name: '.$client->FirstName.' '.$client->Surname);

        if(request()->phoneOID){
            $savedclient=DB::table('patient')->latest('IDCNO')->first();
            foreach(request()->phoneOID as $phn)
            {
                $phone = Phonedetail::find($phn);
                $phone->patient()->associate($client);
                $phone->save();
            }
        }

        //return redirect()->route('client-home')->with('success', 'Client successfully registered');
        return response()->json($client);
    }

    public function updatePatient(Request $request){
        DB::table('patient') ->where('IDCNO', request()->idcno)->update(['FirstName'=>request()->firstname, 'Surname'=>request()->surname, 'Initial'=>self::generateInitials(request()->surname.' '.request()->firstname), 'BirthDate'=>request()->dob, 'Gender'=>request()->gender,'MaritalStatus'=>request()->maritalstatus,'Religion'=>request()->religion,'Street'=>request()->street,'Zone'=>request()->zone,'LandLord'=>request()->landlord,'ProminentLeader'=>request()->prominentleader,'CommonName'=>request()->commonname,'NeighbourFeature'=>request()->neighbour,'IDIStaffIndentification'=>request()->IDIStaffIndentification,'OtherIDIStaffIndentification'=>request()->otherIDIStaffIndentification,'ProblemWithVisting'=>request()->visitingproblem,'DetailedDirection'=>request()->detaileddirection]);

        $client = Patient::find(request()->idcno);
        //dd($request->all());
        $client->countryy()->associate(Country::find(request()->country));
        $client->_tribe()->associate(Tribe::find(request()->tribe));
        $client->_district()->associate(District::find(request()->district));
        $client->_county()->associate(County::find(request()->county));
        $client->_subcounty()->associate(Subcounty::find(request()->subcounty));
        $client->_parish()->associate(Parish::find(request()->parish));
        $client->_village()->associate(Village::find(request()->village));

        if(request()->file('patientimage')){
            self::clientFileData($client);
        }
        $client->save();

        if(request()->phoneOID){
            foreach(request()->phoneOID as $phn)
            {
                $phone = Phonedetail::find($phn);
                $phone->patient()->associate(Patient::find(request()->idcno));
                $phone->save();
            }
        }
        toastr()->success('Client Details Updated');
    }

    public function deletePatient(){
        $client = Patient::destroy(request()->id);
    }

    public function generateInitials(string $name) : string
    {
        //$name = request()->firstname.' '.request()->surname;
        $words = explode(' ', $name);
        return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
    }

//DSDM Type
    public function DSDMForm(){
        return view('patient::registry.newdsdmtype');
    }

    public function createDSDMType(){
        $validator = Validator::make(request()->all(), [ // <---
            'dsdmtypename' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
            $dsdmtype = new DSDMType;
            $dsdmtype->Description = request()->dsdmtypename;
            $dsdmtype->save();
        }
    }

    public function getDSDMTypes(){
        $data = DSDMType::select('OID', 'Description')->take(100)->get();
        return response()->json($data);
    }

    public function deleteDSDMType(){
        $district = DSDMType::destroy(request()->id);
        $data = DSDMType::all();
        return response()->json($data);
    }

//=====================ajax return functions for refresh

    public function getTribes()
    {
        $data = Tribe::select('Name', 'OID')->take(100)->get();
        return response()->json($data);
    }
    public function getReligions()
    {
        $data = Religion::select('Name', 'OID')->take(100)->get();
        return response()->json($data);
    }
    public function getCountries()
    {
        $data = Country::select('Name', 'OID')->take(100)->get();
        return response()->json($data);
    }
    public function getDistricts()
    {
        $data = District::select('Name', 'OID')->where('Country', request()->id)->take(100)->get();
        return response()->json($data);
    }
    public function getCounties()
    {

        $data = County::select('Name', 'OID')->where('District', request()->id)->take(100)->get();
        return response()->json($data);
    }
     public function getSubcounties()
    {
        $data = Subcounty::select('Name', 'OID')->where('County', request()->id)->take(100)->get();
        return response()->json($data);
    }
     public function getParishes()
    {
       $data = Parish::select('Name', 'OID')->where('SubCounty', request()->id)->take(100)->get();
        return response()->json($data);
    }
     public function getVillages()
    {
       $data = Village::select('Name', 'OID')->where('Parish', request()->id)->take(100)->get();
        return response()->json($data);
    }
//=====================ajax return functions for refresh 



}
