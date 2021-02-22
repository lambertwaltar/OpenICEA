<?php

namespace Modules\Patient\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Patient\Entities\AppointmentType;
use Modules\Patient\Entities\Appointment;
use Modules\Patient\Entities\Encounter;
use Carbon\Carbon;
use Modules\Patient\Entities\Patient;
use Modules\Patient\Entities\Triage;
use Modules\Patient\Entities\FlowSheet;
use DB;
use Log, Validator;

class EncounterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    //apply middleware to constructor
    public function __construct(){   
        //$this->middleware(['auth', 'is_locked_out', 'is_approved', 'permission:manage encounters']);
		$this->middleware(['auth', 'is_locked_out', 'is_approved', 'permission:view clients|add clients|edit clients|delete clients|manage encounters'])->except('index');
    }

    //Encounter Functions
        public function encounterForm()
        {   
            $appointmenttypes = AppointmentType::all();
            return view('patient::registry.newencounter', ['appointmenttypes'=>$appointmenttypes]);
        }

        public function createEncounter()
        {

            $encounter = new Encounter;
            $encounter->visitDate = request()->visitdate;
            $encounter->Visitor = request()->visitor;
            $encounter->OtherVisitor = request()->othervisitor;
            $encounter->VisitType = request()->visittype;
            $encounter->OtherVisitType = request()->othervisittype;
            $encounter->RepresentationReason = request()->representationreason;
            $encounter->OtherReason = request()->otherrepreason;
            $encounter->IsPrivate = request()->isprivate;
      
            //$encounter->Return_appointment_date = request()->returndate;
            //$encounter->OtherVisitReason = request()->othervisitreason;
            //$encounter->Other_return_appointment_reason = request()->otherreturnappointmentreason;

            $encounter->_patient()->associate(Patient::find(request()->patientidcno));
            $encounter->save();

            Log::info(request()->reasons);
            
            if(request()->reasons){
                foreach(request()->reasons as $reason)
                {   
                    //$encounter = DB::table('PhoneDetails')->latest('OID')->first();
                    $appointmentreason = AppointmentType::find($reason);
                    $appointmentreason->_encounterreason()->attach($encounter);
                    $appointmentreason->save();
                    
                }
            }

        }
        public function editencounterForm(){
            $data = Encounter::with(['_patient','encounterreason'])->where('OID', request()->id)->get();
            return response()->json($data);
        }

        public function updateEncounter(){
           // dd(request());
            DB::table('encounter') ->where('OID', request()->encounterid)->update(['Visitor' =>request()->visitor, 'RepresentationReason'=>request()->representationreason, 'IsPrivate'=>request()->isprivate,'VisitType'=>request()->visittype]);

            Encounter::find(request()->encounterid)->encounterreason()->detach();
            if(request()->reasons){
                foreach(request()->reasons as $reason)
                {   
                    $appointmentreason = AppointmentType::find($reason);
                    $appointmentreason->_encounterreason()->attach(request()->encounterid);
                    $appointmentreason->save();
                    
                }
            }

        }

        public function getAllPatientEncounters(){
            $data = Patient::with(['encounters','encounters.encounterreason'])->where('IDCNO', request()->id)->get();
            return response()->json($data);
        }

        public function deleteEncounter(){
            $encounter = Encounter::destroy(request()->id);
        }

    //Appointment type Functions
        public function appointmentTypeForm()
        {
            return view('patient::registry.newapointmenttype');
        }

        public function createAppointmentType()
        {
            $appointmenttype = new AppointmentType;
            $appointmenttype->Name = request()->appointmenttypename;
            $appointmenttype->save();
            
        }

        public function getAllAppointmentTypes()
        {
            $data = AppointmentType::select('OID','Name')->get();
            return response()->json($data);
        }

        public function deleteAppointmentType()
        {
            $appointmenttype = AppointmentType::destroy(request()->id);
            $data = Religion::all();
            return response()->json($data);
        }

    //Appointment Functions
        public function scheduleAppointment()
        {				
			$appointmenttypes = AppointmentType::all();
			return view('patient::registry.newappointment', ['appointmenttypes'=>$appointmenttypes]);
        }
		
		public function checkapointment(){
			$patientappointment = Appointment::where('Patient',request()->idcno)->first();
			return response()->json($patientappointment);
		}

        public function saveAppointment()
        {
            if(Appointment::where('Patient',request()->patientidcno)->count() > 0){
				DB::table('appointments') ->where('Patient',request()->patientidcno)->update(['ReturnDate' =>request()->returndate, 'ReturnTime'=>request()->returntime]);
                //return response()->json(['error'=>'Client already has a pending appointment']);
            }
            else{
                $appointment = new Appointment;
                $appointment->ReturnDate = request()->returndate;
                $appointment->ReturnTime = request()->returntime;
                
                $appointment->appointmentpatient()->associate(Patient::find(request()->patientidcno));
                $appointment->save();

                Log::info(request()->reasons);
                
                if(request()->reasons){
                    foreach(request()->reasons as $reason)
                    {   
                        $appointmentreason = AppointmentType::find($reason);
                        $appointmentreason->_appointmentreason()->attach($appointment);
                        $appointmentreason->save();
                        
                    }
                }
            }
            
            
        }

        public function patientAppointment(){
            $patient = Patient::find(request()->idcno);
            $flowsheet = Patient::where('IDCNO',request()->idcno)->with('patientfsdetail','patientfsdetail.fsencounter','returnappointment')->get();
            return response()->json(array('appointment'=>$patient->returnappointment()->exists(),'flowsheet'=>$patient->patientfsdetail()->exists(),'flowsheetdata'=>$flowsheet));
        }

    //triage functions
        public function triageForm(){
            return view('patient::registry.triageform');
        }

        public function createTriageDetails(){
            $validator = Validator::make(request()->all(), [ // <---
            'bphigh' => 'required|min:0', 
            'bplow' => 'required|min:0', 
            'temperature' => 'required|min:0', 
            'weight' => 'required|min:0', 
            'height' => 'required|min:0', 
            'muac' => 'min:0', 
            ]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $triage = new Triage();
                $triage->TriageDate = Carbon::now();
                $triage->BPHigh = request()->bphigh;
                $triage->BPLow = request()->bplow;
                $triage->Temperatue = request()->temperature;
                $triage->Weight = request()->weight;
                $triage->Height = request()->height;
                $triage->MUAC = request()->muac;

                $triage->triageencounter()->associate(request()->encounterno);
                $triage->triagepatient()->associate(request()->idcno);
                $triage->triageprovider()->associate(Auth()->user()->OID);
                $triage->save();
            }
           
        }

        public function getTriageDetail()
        {
            $data = FlowSheet::select()->where([['Encounter', request()->encounterid],['Patient',request()->idcno]])->orderBy('OID', 'desc')->first();
            return response()->json($data);
        }



}
