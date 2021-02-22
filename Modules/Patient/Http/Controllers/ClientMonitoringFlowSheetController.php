<?php

namespace Modules\Patient\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Patient\Entities\FlowSheet;
use Modules\Patient\Entities\DSDMType;
use Modules\Patient\Entities\Appointment;
use Modules\Prescription\Entities\Regimen;
use Modules\Prescription\Entities\FundingSource;
use Validator;
use Carbon\Carbon;
use Crypt,Log,DB;

class ClientMonitoringFlowSheetController extends Controller
{
    //apply middleware to constructor
    public function __construct(){   
        //$this->middleware(['auth', 'is_locked_out', 'is_approved']);
        $this->middleware(['auth', 'is_locked_out', 'is_approved', 'permission:view clients|add clients|edit clients|delete clients|manage encounters'])->except('index');
    }

    public function index()
    {
        $flowsheets = FlowSheet::where('Patient',request()->idcno)->with('fspatient.returnappointment','fsencounter.encounterreason')->orderBy('created_at', 'desc')->get();
		Log::info($flowsheets);
        return view('patient::flowsheet.index',compact('flowsheets'));
    }

    public function newFlowSheet(){
		$regimen = Regimen::all();
		$dsdmtypes = DSDMType::all();
		$fundingsources = FundingSource::all();
		$lastfs=DB::table('flowsheet')->latest('OID')->first();
        return view('patient::flowsheet.newflowsheet', compact('regimen','dsdmtypes','fundingsources','lastfs'));
		
    }

    public function saveFlowSheet(){
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
            $fs = new FlowSheet();
			//General Triage
				$fs->TriageDate = Carbon::now();
				$fs->BPHigh = request()->bphigh;
				$fs->BPLow = request()->bplow;
				$fs->Temperatue = request()->temperature;
				$fs->Weight = request()->weight;
				$fs->Height = request()->height;
				$fs->MUAC = request()->muac;
				$fs->Coughing = request()->coughing;
				$fs->BloodSputum = request()->bloodsputum;
				$fs->PersistentFever = request()->persistentfever;
				$fs->WeightLoss = request()->weightloss;
				$fs->NightSweats = request()->nightsweats;
				$fs->WHOStage = request()->whostage;
				$fs->Karnofskyscore = request()->karnofkyscore;
				$fs->CDCScore = request()->cdcscore;
				$fs->TB = request()->tb;
				//$fs->Reasons = request()->visitreasons;
			//Clinical Events
			//var_dump($this->convertArray((array)request()->ols_malignancy));
				$fs->OlsMalignancy = $this->convertArray((array)request()->ols_malignancy);
				$fs->OtherClinicalEvent = $this->convertArray((array)request()->otherclinicalevent);
				$fs->MenstrualStatus = request()->menstrualstatus;
				$fs->StartLastMenstrual = request()->lastmenstrualstart;
				$fs->ContraceptiveMethod = $this->convertArray((array)request()->contraceptive_method);
				$fs->STIScreeningSymptom = $this->convertArray((array)request()->screeningsymptom);
			//Care Status
				$fs->Prophylaxis = $this->convertArray((array)request()->prophylaxis);
				$fs->INHStart = request()->inhstartdate;
				$fs->IHNEnd = request()->inhenddate;
				$fs->ART = request()->ART;
				$fs->NotStrartARVReason = $this->convertArray((array)request()->nostartARVreason);
			//ART
				$fs->AdherenceScore = request()->adherencescore;
				$fs->Toxicity = $this->convertArray((array)request()->toxicity);
				$fs->SwitchReason = $this->convertArray((array)request()->switchreason);
				$fs->SwitchDate = request()->switchdate;
				$fs->StopReason = $this->convertArray((array)request()->artstopreason);
				$fs->StopDate = request()->artstopdate;
				$fs->OtherARTSource = request()->otherartsource;
			//Concurrent Medications
				$fs->Hypertension = request()->hypertension;
				$fs->AntiHypertension = request()->antihypertension;
				$fs->HypertensionMedicine = $this->convertArray((array)request()->hypermeds);
				$fs->OtherHypertensionMedicine = request()->otherhypermeds;
				$fs->Diabetes = request()->diabetesmellitus;
				$fs->AntiDiabetes = request()->antidiabetes;
				$fs->DiabetesMedicine = $this->convertArray((array)request()->diameds);
				$fs->OtherDiabetesMedicine = request()->otherdiameds;
				$fs->Cancer = request()->cancer;
				$fs->CancerType = request()->cancertype;
				$fs->Chemotherapy = request()->onchemo;
				$fs->OtherChemotherapy = request()->chemotype;
				$fs->OrganMonitoring = request()->oganmonitoring;
				$fs->OrganMonitored = request()->monitoredorgan;
				$fs->RenalDisease = request()->renaldisease;
				$fs->CurrenteGFR = request()->currentefgr;
				$fs->UrineProtein = request()->urineprotein;
				$fs->HeartDisease = request()->heartdisease;
				$fs->ECG = request()->ecg;
				$fs->HeartECHO = request()->heartecho;
				$fs->ECGDate = request()->ecgdate;
				$fs->ECHODate = request()->echodate;
			//Concurrent Conditions
				$fs->DVT = request()->dvt;
				$fs->Asthma = request()->asthma;
				$fs->Epilepsy = request()->epilepsy;
				$fs->MentalHealthIllness = request()->mentalillness;
				$fs->HepatitisB = request()->hepatitisb;
				$fs->Disability = request()->disability;
				$fs->SpecifyDisability = request()->specifydisability;
				$fs->OtherDiability = request()->otherdisability;
				$fs->OtherMedicalCondition = request()->othermedicalcondition;
				$fs->Comments = request()->visitreasons;

            $fs->fsencounter()->associate(request()->encounterno);
            $fs->fspatient()->associate(request()->idcno);
            $fs->fsprovider()->associate(Auth()->user()->OID);
			$fs->fsfundingsource()->associate(request()->artsource);
			$fs->fsdsdmtype()->associate(request()->dsdmtype);
			$fs->fsregimen()->associate(request()->regimen);
			
			//regimen, DSDMType, ARTSource
            $fs->save();
			$savedfs=DB::table('flowsheet')->latest('OID')->first();
			return response()->json($savedfs);
        }
    }
	public function convertArray(array $data){
		$stringsave='';
		//Log:info($data);
		if($data !== []){
			foreach($data as $dat){
				$stringsave=$stringsave.$dat.',';
			}
			Log::info((string)$stringsave);
		}
		else{
			$stringsave=Null;
		}
		return $stringsave;
	}

    public function editFlowSheet(){
        $flowsheets = FlowSheet::where('OID',Crypt::decrypt(request()->id))->with(['fsfundingsource','fsdsdmtype','fsregimen'])->get();
		$regimen = Regimen::all();
		$dsdmtypes = DSDMType::all();
		$fundingsources = FundingSource::all();
        Log::info($flowsheets);
        return view('patient::flowsheet.editflowsheet', compact('flowsheets','regimen','dsdmtypes','fundingsources'));
    }

    public function updateFlowSheet(){
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
            DB::table('flowsheet') ->where('OID', request()->flowsheetoid)->update([
			'BPHigh'=>request()->bphigh,
			'BPLow'=>request()->bplow,
			'Temperatue'=>request()->temperature,
			'Weight'=>request()->weight,
			'Height'=>request()->height,
			'MUAC'=>request()->muac,
			'Coughing'=>request()->coughing,
			'BloodSputum'=>request()->bloodsputum,
			'PersistentFever'=>request()->persistentfever,
			'WeightLoss'=>request()->weightloss,
			'NightSweats'=>request()->nightsweats,
			'WHOStage'=>request()->whostage,
			'Karnofskyscore'=>request()->karnofkyscore,
			'CDCScore'=>request()->cdcscore,
			'TB'=>request()->tb,

			'OlsMalignancy'=>$this->convertArray((array)request()->ols_malignancy),
			'OtherClinicalEvent'=>$this->convertArray((array)request()->otherclinicalevent),
			'MenstrualStatus'=>request()->menstrualstatus,
			'StartLastMenstrual'=>request()->lastmenstrualstart,
			'ContraceptiveMethod'=>$this->convertArray((array)request()->contraceptive_method),
			'STIScreeningSymptom'=>$this->convertArray((array)request()->screeningsymptom),

			'Prophylaxis'=>$this->convertArray((array)request()->prophylaxis),
			'INHStart'=>request()->inhstartdate,
			'IHNEnd'=>request()->inhenddate,
			'ART'=>request()->ART,
			'NotStrartARVReason'=>$this->convertArray((array)request()->nostartARVreason),

			'AdherenceScore'=>request()->adherencescore,
			'Toxicity'=>$this->convertArray((array)request()->toxicity),
			'SwitchReason'=>$this->convertArray((array)request()->switchreason),
			'SwitchDate'=>request()->switchdate,
			'StopReason'=>$this->convertArray((array)request()->artstopreason),
			'StopDate'=>request()->artstopdate,
			'OtherARTSource'=>request()->otherartsource,

			'Hypertension'=>request()->hypertension,
			'AntiHypertension'=>request()->antihypertension,
			'HypertensionMedicine'=>$this->convertArray((array)request()->hypermeds),
			'OtherHypertensionMedicine'=>request()->otherhypermeds,
			'Diabetes'=>request()->diabetesmellitus,
			'AntiDiabetes'=>request()->antidiabetes,
			'DiabetesMedicine'=>$this->convertArray((array)request()->diameds),
			'OtherDiabetesMedicine'=>request()->otherdiameds,
			'Cancer'=>request()->cancer,
			'CancerType'=>request()->cancertype,
			'Chemotherapy'=>request()->onchemo,
			'OtherChemotherapy'=>request()->chemotype,
			'OrganMonitoring'=>request()->oganmonitoring,
			'OrganMonitored'=>request()->monitoredorgan,
			'RenalDisease'=>request()->renaldisease,
			'CurrenteGFR'=>request()->currentefgr,
			'UrineProtein'=>request()->urineprotein,
			'HeartDisease'=>request()->heartdisease,
			'ECG'=>request()->ecg,
			'HeartECHO'=>request()->heartecho,
			'ECGDate'=>request()->ecgdate,
			'ECHODate'=>request()->echodate,

			'DVT'=>request()->dvt,
			'Asthma'=>request()->asthma,
			'Epilepsy'=>request()->epilepsy,
			'MentalHealthIllness'=>request()->mentalillness,
			'HepatitisB'=>request()->hepatitisb,
			'Disability'=>request()->disability,
			'SpecifyDisability'=>request()->specifydisability,
			'OtherDiability'=>request()->otherdisability,
			'OtherMedicalCondition'=>request()->othermedicalcondition,
			'Comments'=>request()->visitreasons,
			]);
        }
    }

    public function deleteFlowSheet(){
        $data = Flowsheet::destroy(Crypt::decrypt(request()->id));
    }
    
}
