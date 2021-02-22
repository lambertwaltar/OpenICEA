<?php

namespace Modules\Laboratory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Laboratory\Entities\LabTest;
use Modules\Laboratory\Entities\SampleType;
use Modules\Laboratory\Entities\LabRequisition;
use Modules\User\Entities\User;
use Modules\Laboratory\Entities\LabSampleCollection;
use Modules\Laboratory\Notifications\NewLabRequisition;
use Modules\Laboratory\Entities\GeneralRequisitionResult;
use Modules\Laboratory\Entities\HIVScreeningRequisitionResult;
use Log,Notification,Crypt,DB;
use Carbon\Carbon;
use PDF;
use Validator;



class LaboratoryController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'is_locked_out', 'is_approved','permission:view lab requests|collect lab samples|enter lab results']);
    }

    //mark notifications
        public function markNotifications(){
            auth()->user()->unreadNotifications->markAsRead();
        }

    //requisition 
        public function requisitionForm(){
            $sampletypes = SampleType::all();
            return view('laboratory::requisitionform',compact('sampletypes'));
        }

        public function createRequisition(){
            
            if(request()->labtests){
                $requisition = new LabRequisition();
                $requisition->OrderDate = Carbon::now();
                $requisition->OrderedTime = request()->orderedtime;
                $requisition->ClinicalNotes = request()->notes;

                $requisition->rencounter()->associate(request()->encounterno);
                $requisition->rpatient()->associate(request()->idcno);
                $requisition->rprovider()->associate(Auth()->user()->OID);
                $requisition->save();
                foreach(request()->labtests as $labtest)
                {   
                    $requisitionlabtest = LabTest::find($labtest);
                    $requisitionlabtest->_requisitiontest()->attach($requisition);
                    $requisitionlabtest->save();
                    
                }

                    $users = User::permission('view lab requests','collect lab samples','enter lab results')->get();
                $details = [
                    'time' => Carbon::now(),
                    'data'=>'New Lab Requisition by '.auth()->user()->FirstName.' '.auth()->user()->LastName
                ];

                Notification::send($users, new NewLabRequisition($details));
            }
            else{
            
                return response()->json(['error'=>'Select Lab tests to complete a Lab Requisition']);
            }
        }

        public function editLabRequisition()
        {   
            $result=array();
            $id=Crypt::decrypt(request()->id);
            $sampletypes = SampleType::all();
            $requisition = LabRequisition::with(['rpatient','rprovider','rencounter','requisitiontest','requisitiontest.labsample','_grrequisition','_grrequisition.grprovider','_lscrequisition.lscprovider'])->where('OID',$id)->get();
            array_push($result,$requisition);
            Log::info($requisition);
            return view('laboratory::editrequisition', compact('requisition','sampletypes'));
        }

        public function getRequisitionTests(){
            $requisition = LabRequisition::with(['rpatient','rprovider','rencounter','requisitiontest','requisitiontest.labsample'])->where('OID',request()->id)->get();

            return response()->json($requisition);
        }

        public function updateLabRequisition(){
            if(request()->labtests){
                DB::table('LabRequisition') ->where('OID', request()->requisitionno)->update(['ClinicalNotes'=>request()->notes]);

                $requisition = LabRequisition::find(request()->requisitionno);
                $requisition->rencounter()->associate(request()->encounterno);
                $requisition->rpatient()->associate(request()->idcno);
                $requisition->rprovider()->associate(request()->providerno);
                $requisition->requisitiontest()->detach();

                $requisition->requisitiontest()->detach();
                foreach(request()->labtests as $labtest)
                {   
                    $requisition->requisitiontest()->attach($labtest);
                    $requisition->save();
                    // $requisitionlabtest = LabTest::find($labtest);
                    // $requisitionlabtest->_requisitiontest()->detach();
                    // $requisitionlabtest->_requisitiontest()->attach($requisition);
                    // $requisitionlabtest->save();
                    
                }

                
                $users = User::permission('view lab requests','collect lab samples','enter lab results')->get();
                $details = [
                    'time' => Carbon::now(),
                    'data'=>'New Lab Requisition by '.auth()->user()->FirstName.' '.auth()->user()->LastName
                ];

                Notification::send($users, new NewLabRequisition($details));
            }
            else{
            
                return response()->json(['error'=>'Select Lab tests to complete a Lab Requisition']);
            }
        }

        public function deleteRequisition(){
            $id = Crypt::decrypt(request()->id);
            LabRequisition::destroy($id);
        }

        public function showRequisitions(){
            if(request()->date){
            $requisitions = LabRequisition::with(['rprovider','rencounter','requisitiontest','requisitiontest.labsample'])->where('OrderDate',request()->date)->orderBy('OrderDate','desc')->get();
            }
            else{
            $requisitions = LabRequisition::with(['rprovider','rencounter','requisitiontest','requisitiontest.labsample'])->where('OrderDate',Carbon::now()->toDateString())->orderBy('OrderDate','desc')->get();
            }
            return view('laboratory::labrequisitions',compact('requisitions'));
        }

        public function getNotifications(){
            $data = auth()->user()->unreadNotifications;
            return response()->json($data);
        }

    //Lab Test
        public function labTestForm(){
            $sampletypes = SampleType::all();
            return view('laboratory::labtestform',compact('sampletypes'));
        }

        public function createLabeTest(){
             $validator = Validator::make(request()->all(), [
                'name' => 'required',
                'sampletype' => 'required'

            ]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $labtest = new LabTest();
                $labtest->TestName = request()->name;
                $labtest->RequiresApproval = request()->approval;
                $labtest->TypeOfLabTest = request()->testtype;
       
                $labtest->labsample()->associate(SampleType::find(request()->sampletype));
                $labtest->save();

            }   

            
            //Log::info(request()->itemOID);
        }

        public function getAllLabTests(){
            //$data = LabTest::with(['labsample'])->get();
            $data = LabTest::select('OID','TestName','Sample',DB::raw("
                (case TypeOfLabTest 
                when '1' then 'HIV Screening'
                when '2' then 'Core Lab'
                when '3' then 'Stat Lab'
                when 'null' then '-'
                end
                ) as TypeOfLabTest"))->with(['labsample'])
                ->get();
            return response()->json($data);
        }

        public function deleteLabTest(){
            LabTest::destroy(request()->id);
        }

    //sample type
        public function sampleTypeForm(){
            return view('laboratory::sampletypeform');
        }

        public function createSampleType(){

            $validator = Validator::make(request()->all(), [
                'name' => 'required|unique:SampleType,Name'
            ]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $sample = new SampleType();
                $sample->Name = request()->name;
                $sample->save();
            }   
        }

        public function getAllSampleTypes(){
            $data = SampleType::select('OID','Name')->get();
            return response()->json($data);
        }
        
        public function deleteSampleType(){
            LabTest::destroy(request()->id);
        }

        public function getSampleTests(){
            //Log::info(request()->samples);
            $data = LabTest::whereIn('Sample', request()->samples)->get();
            return response()->json($data);
        }

    //collect sample
        public function collectSample(){
            $id = Crypt::decrypt(request()->id);
            $requisition = LabRequisition::with(['rpatient','rprovider','rencounter','requisitiontest','requisitiontest.labsample'])->where('OID',$id)->get();
            //Log::info($requisition);
            return view('laboratory::collectsample', compact('requisition'));
        }

        public function updateRequisition(){
            DB::table('LabRequisition') ->where('OID', request()->requisitionno)->update(['CollectedDate'=>Carbon::now(), 'CollectedBy'=>auth()->user()->FirstName.' '. auth()->user()->LastName, 'SampleCollected'=>'1']);

            $requisition = new LabSampleCollection();
            $requisition->IsHIVScreening = request()->hivrequisition;
            $requisition->IsCoreLabRequisition = request()->corelabrequisition;
            $requisition->IsGeneralRequisition = request()->generalrequisition;
            $requisition->CollectedDate = Carbon::now();

            $requisition->lscrequisition()->associate(request()->requisitionno);
            $requisition->lscpatient()->associate(request()->idcno);
            $requisition->lscprovider()->associate(Auth()->user()->OID);
            $requisition->lscencounter()->associate(request()->encounterno);
            $requisition->save();

            $lab = LabRequisition::find(request()->requisitionno);
            $lab->_lscrequisition()->associate($requisition);
            $lab->save();

            $user = User::find(request()->orderedby);
            $details = [
                'time' => Carbon::now(),
                'data'=>'Sample Collected for Patient:- '.request()->idcno .'| Encounter '.request()->encounter
            ];

            Notification::send($user, new NewLabRequisition($details));
        }

    //submit results
        public function submitGenResults(){
            $id = Crypt::decrypt(request()->id);
            $requisition = LabRequisition::with(['rpatient','rprovider','rencounter','requisitiontest','requisitiontest.labsample',])->where('OID',$id)->get();
            //Log::info($requisition);
            return view('laboratory::submitgenresults', compact('requisition'));
        }

        public function saveGeneralResults(){
            $result = new GeneralRequisitionResult();
            Log::info(request()->urine);
            $result->PurpleTopTube = request()->purpletoptube;
            $result->RedTopTube = request()->redtoptube;
            $result->Urine = request()->urine;
            $result->Sputum = request()->sputum;
            //$result->FingerPrick = '';
            $result->OtherSample = request()->othersample;
            $result->OtherSampleSpecify = request()->othersamplespecify;
            $result->CollectionDate = request()->collecteddate;
            $result->CollectionTime = request()->collectedtime;
            $result->TestDate = Carbon::now();

            //$result->Hemoglobin = '';
            $result->HemoglobinResults = request()->hemoglobin;
            //$result->PeripheralSmear = request()->purpletoptube;
            $result->PeripheralSmearResults = request()->periheralsmear;
            //$result->Syphillis = request()->syphillis;
            $result->SyphillisResults = request()->syphillis;
            $result->RPR = request()->prpresult;
            $result->RPRTitreValue = request()->rprtitrevalue;
            //$result->BloodGlucose = request()->redtoptube;
            $result->BloodGlucoseResults = request()->bloodglucose;
            //$result->BloodSmear = request()->redtoptube;
            $result->MRDTResult = request()->mrdtresults;
            $result->ParasitesSeen = request()->parasitesseen;
            $result->ParasiteQuantity = request()->parasitequantity;
            $result->BloodSmearParasiteSpecies = request()->parasitespecies;
            $result->BloodSmearResultComments = request()->smearcomments;

            //$result->UrineDipStick = request()->redtoptube;
            $result->UrineColor = request()->urinecolor;
            $result->UrineClarity = request()->urineclarity;
            $result->UrineSpecificGravity = request()->urinegravity;
            $result->UrinePH = request()->urineph;
            $result->UrineNitrites = request()->urinenitrites;
            $result->UrineLeuk = request()->urineleukocytes;
            $result->UrineProtein = request()->urineprotein;
            $result->UrineGlucose = request()->urineglucose;
            $result->UrineKetones = request()->urineketones;
            $result->UrineUrobil = request()->urineurobil;
            $result->UrineBilirubin = request()->urinebilirubin;
            $result->UrineBlood = request()->urineblood;
            $result->UrineLAMResult = request()->urinelamresults;

            //$result->UrineMicroscopic = request()->redtoptube;
            $result->UrineWBCs = request()->urinewbc;
            $result->UrineRBCs = request()->urinerbc;
            $result->UrineEpis = request()->urineeps;
            $result->UrineCasts = request()->urinecasts;
            $result->UrineCrystals = request()->urinecrystals;
            $result->UrineYeast = request()->urineyeast;
            $result->UrineOrg = request()->urineorg;
            $result->UrinePregnancy = request()->umpresult;

            //$result->StoolDirectExamination = request()->stoolform;
            $result->StoolForm = request()->stoolform;
            $result->StoolParasitesSeen = request()->stoolparasiteseen;
            $result->StoolParasiteSpecies = request()->stoolparasitespecies;
            $result->StoolWBCs = request()->stoolwbc;
            $result->StoolYeast = request()->stoolyeast;
            $result->GramStainSource = request()->stainsource;
            $result->GramStainOrganismsSeen = request()->stainorganismsseen;
            $result->GramStainOrganisms = request()->stainorganisms;

            //$result->FlourescenceMicroscopic = request()->purpletoptube;
            $result->ResultFlourescenceMicroscopy = request()->flresult;
            $result->LevelFlourescenceMicroscopy = request()->fllevel;
            //$result->znMicroscopy = request()->redtoptube;
            $result->ResultznMicroscopy = request()->znresult;
            $result->LevelznMicroscopy = request()->znlevel;
            $result->AFBSmearLymph = request()->tblymph;
            $result->AFBSmearSputum = request()->tbsputum;
            $result->TBCultureDone = request()->tbculture;
            $result->TBCultureResult = request()->tbcultureresults;
            $result->RifampicinSensitivityResult = request()->rifampicin;
            $result->IsoniazidSensitivityResult = request()->isoniazid;
            $result->PyrazinamideSensitivityResult = request()->pyrazinamide;
            $result->EthambutolSensitivityResult = request()->ethambutol;
            $result->StreptomycinSensitivityResult = request()->streptomycin;

            $result->CragResult = request()->cragresult;

            $result->grrequisition()->associate(LabRequisition::find(request()->requisitionno));
            $result->grpatient()->associate(request()->idcno);
            $result->grencounter()->associate(request()->encounter);
            $result->grprovider()->associate(Auth()->user()->OID);
            $result->grsamplecollection()->associate(request()->samplecollectionno);
            $result->save();

            $lab = LabRequisition::find(request()->requisitionno);
            $lab->_grrequisition()->associate($result);
            //Log::info($lab);
            $lab->save();

            $user = User::find(request()->orderedbyoid);

            $details = [
                'time' => Carbon::now(),
                'data'=>'Lab Results Ready for Patient:- '.request()->idcno.'| Encounter: '.request()->encounter
            ];
            Notification::send($user, new NewLabRequisition($details));

            DB::table('LabRequisition') ->where('OID', request()->requisitionno)->update(['SampleCollected'=>'2']);
        }

        public function submitHIVResults(){
            $id = Crypt::decrypt(request()->id);
            $sample = LabSampleCollection::select()->where('LabRequisition',$id)->get();
            $requisition = LabRequisition::with(['rpatient','rprovider','rencounter','requisitiontest','requisitiontest.labsample',])->where('OID',$id)->get();
            //Log::info(compact('requisition','sample'));
            return view('laboratory::submithivresults', compact('requisition','sample'));
        }
        public function saveHivResults(){
            $result = new HIVScreeningRequisitionResult();
            $result->PurpleTopTube = request()->purpletoptube;
            $result->RedTopTube = request()->redtoptube;
            $result->OtherSample = request()->othersample;
            $result->OtherSampleSpecify = request()->othersamplespecify;
            //$result->SampleComments = request()->hemoglobin;
            $result->TestDate = Carbon::now();
            $result->CollectionDate = request()->collecteddate;
            $result->CollectionTime = request()->collectedtime;
            $result->AIDSDefiningIllness = request()->aidsdefiningillness;
            //$result->OptionADoctor = request()->purpletoptube;
            //$result->OptionBDoctor_Counsellor = request()->periheralsmear;
            $result->Comment = request()->comments;
            $result->SingleTest = request()->singletest;
            $result->HIVScreeningOption = request()->screeningoption;
            $result->ScreeningTest = request()->screeningtest1;
            $result->ConfirmationTest = request()->confirmingtest;
            $result->TieBreakerTest = request()->tiebreaker;
            $result->FinalResult = request()->finalresult;
                
            $result->hivrequisition()->associate(request()->requisitionno);
            $result->hivpatient()->associate(request()->idcno);
            $result->hivencounter()->associate(request()->encounter);
            $result->hivprovider()->associate(Auth()->user()->OID);
            $result->hivsamplecollection()->associate(request()->samplecollectionno);
            $result->save();

            $user = User::find(request()->orderedbyoid);

            $details = [
                'time' => Carbon::now(),
                'data'=>'Lab Results Ready for Patient:- '.request()->idcno.'| Encounter: '.request()->encounter
            ];
            Notification::send($user, new NewLabRequisition($details));

            DB::table('LabRequisition') ->where('OID', request()->requisitionno)->update(['SampleCollected'=>'2']);
        }

    //patient Labs
        public function patientLabs(){
            if(request()->date){
                $orderdate = explode("/",request()->date);
                $requisitions = LabRequisition::with(['rpatient','rprovider','rencounter','requisitiontest','requisitiontest.labsample','_grrequisition','_grrequisition.grprovider','_lscrequisition.lscprovider'])->where([['Patient','=',$orderdate[1]],['OrderDate','=',$orderdate[0]]])->orderBy('OrderDate','desc')->get();
                Log::info($orderdate[1]);
            }
            else{ 
                $requisitions = LabRequisition::with(['rpatient','rprovider','rencounter','requisitiontest','requisitiontest.labsample','_grrequisition','_grrequisition.grprovider','_lscrequisition.lscprovider'])->where('Patient',request()->idcno)->orderBy('OrderDate','desc')->get();
            }

            
            return view('laboratory::patientlabs',compact('requisitions'));
        }

    //results
        public function viewResults(){
            $id = Crypt::decrypt(request()->id);
            $results = GeneralRequisitionResult::with(['grprovider','grpatient'])->where('LabRequisition',$id)->get();
            $samplecollection = LabSampleCollection::with(['lscprovider'])->where('LabRequisition',$id)->get();
            $requisition = LabRequisition::with(['rprovider',])->where('OID',$id)->get();
            //Log::info($result);
            return view('laboratory::viewresults',compact('results','samplecollection','requisition'));
            // return view('laboratory::viewresults');
        }

        public function editResults(){
            $id = Crypt::decrypt(request()->id);
            $results = GeneralRequisitionResult::with(['grprovider','grpatient'])->where('LabRequisition',$id)->get();
            $samplecollection = LabSampleCollection::with(['lscprovider'])->where('LabRequisition',$id)->get();
            $requisition = LabRequisition::with(['rprovider',])->where('OID',$id)->get();
            //Log::info($result);
            return view('laboratory::editresults',compact('results','samplecollection','requisition'));
            // return view('laboratory::viewresults');
        }

        public function updateResults(){

            DB::table('generalrequisitionresult')
              ->where('OID', request()->resultno)
              ->update([
                    'PurpleTopTube' => request()->purpletoptube,
                    'RedTopTube' => request()->redtoptube,
                    'Urine' => request()->urine,
                    'Sputum' => request()->sputum,
                    'OtherSample' => request()->othersample,
                    'OtherSampleSpecify' => request()->othersamplespecify,
                    'CollectionDate' => request()->collecteddate,
                    'CollectionTime' => request()->collectedtime,
                    //'TestDate' => Carbon::now(),
                    'HemoglobinResults' => request()->hemoglobin,
                    'PeripheralSmearResults' => request()->periheralsmear,
                    'SyphillisResults' => request()->syphillis,
                    'RPR' => request()->prpresult,
                    'RPRTitreValue' => request()->rprtitrevalue,
                    'BloodGlucoseResults' => request()->bloodglucose,
                    'MRDTResult' => request()->mrdtresults,
                    'ParasitesSeen' => request()->parasitesseen,
                    'ParasiteQuantity' => request()->parasitequantity,
                    'BloodSmearParasiteSpecies' => request()->parasitespecies,
                    'BloodSmearResultComments' => request()->smearcomments,
                    'UrineColor' => request()->urinecolor,
                    'UrineClarity' => request()->urineclarity,
                    'UrineSpecificGravity' => request()->urinegravity,
                    'UrinePH' => request()->urineph,
                    'UrineNitrites' => request()->urinenitrites,
                    'UrineLeuk' => request()->urineleukocytes,
                    'UrineProtein' => request()->urineprotein,
                    'UrineGlucose' => request()->urineglucose,
                    'UrineKetones' => request()->urineketones,
                    'UrineUrobil' => request()->urineurobil,
                    'UrineBilirubin' => request()->urinebilirubin,
                    'UrineBlood' => request()->urineblood,
                    'UrineLAMResult' => request()->urinelamresults,
                    'UrineWBCs' => request()->urinewbc,
                    'UrineRBCs' => request()->urinerbc,
                    'UrineEpis' => request()->urineeps,
                    'UrineCasts' => request()->urinecasts,
                    'UrineCrystals' => request()->urinecrystals,
                    'UrineYeast' => request()->urineyeast,
                    'UrineOrg' => request()->urineorg,
                    'UrinePregnancy' => request()->umpresult,
                    'StoolForm' => request()->stoolform,
                    'StoolParasitesSeen' => request()->stoolparasiteseen,
                    'StoolParasiteSpecies' => request()->stoolparasitespecies,
                    'StoolWBCs' => request()->stoolwbc,
                    'StoolYeast' => request()->stoolyeast,
                    'GramStainSource' => request()->stainsource,
                    'GramStainOrganismsSeen' => request()->stainorganismsseen,
                    'GramStainOrganisms' => request()->stainorganisms,
                    'ResultFlourescenceMicroscopy' => request()->flresult,
                    'LevelFlourescenceMicroscopy' => request()->fllevel,
                    'ResultznMicroscopy' => request()->znresult,
                    'LevelznMicroscopy' => request()->znlevel,
                    'AFBSmearLymph' => request()->tblymph,
                    'AFBSmearSputum' => request()->tbsputum,
                    'TBCultureDone' => request()->tbculture,
                    'TBCultureResult' => request()->tbcultureresults,
                    'RifampicinSensitivityResult' => request()->rifampicin,
                    'IsoniazidSensitivityResult' => request()->isoniazid,
                    'PyrazinamideSensitivityResult' => request()->pyrazinamide,
                    'EthambutolSensitivityResult' => request()->ethambutol,
                    'StreptomycinSensitivityResult' => request()->streptomycin,
                    'CragResult' => request()->cragresult
                ]);

        }


    //print results
        public function PrintResults(){

            $id = Crypt::decrypt(request()->id);
            $results = GeneralRequisitionResult::with(['grprovider','grpatient','grencounter'])->where('LabRequisition',$id)->take(1)->get();
            $samplecollection = LabSampleCollection::with(['lscprovider'])->where('LabRequisition',$id)->get();
            $requisition = LabRequisition::with(['rprovider',])->where('OID',$id)->get();
            foreach($results as $result){
                $patient = $result->grpatient->FirstName." ".$result->grpatient->Surname;
                $encounter = $result->grencounter->visitDate;

                $pdfname = $patient.' [ Encounter:'.$encounter.'].pdf';
            }
            $pdf = PDF::loadView('laboratory::printresults', compact('results','samplecollection','requisition'));
            return $pdf->stream($pdfname);
            // return $pdf->stream('Lab Results.pdf');
        }

        public function Print(){

            $id = Crypt::decrypt(request()->id);
            $results = GeneralRequisitionResult::with(['grprovider','grpatient','grencounter'])->where('LabRequisition',$id)->take(1)->get();
            $samplecollection = LabSampleCollection::with(['lscprovider'])->where('LabRequisition',$id)->get();
            $requisition = LabRequisition::with(['rprovider',])->where('OID',$id)->get();
            foreach($results as $result){
                $patient = $result->grpatient->FirstName." ".$result->grpatient->Surname;
                $encounter = $result->grencounter->visitDate;

                $pdfname = $patient.' [ Encounter:'.$encounter.'].pdf';
            }
            //$pdf = PDF::loadView('laboratory::printresults', compact('results','samplecollection','requisition'));
            //return $pdf->stream($pdfname);

            return view('laboratory::printresults',compact('results','samplecollection','requisition'));
        }
        

}
