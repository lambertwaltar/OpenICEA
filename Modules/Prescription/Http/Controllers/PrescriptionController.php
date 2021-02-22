<?php

namespace Modules\Prescription\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Prescription\Entities\Store;
use Modules\Prescription\Entities\FundingSource;
use Modules\Prescription\Entities\Condition;
use Modules\Prescription\Entities\Location;
use Modules\Prescription\Entities\UnitDescription;
use Modules\Prescription\Entities\UnitOfMeasurement;
use Modules\Prescription\Entities\Schedule;
use Modules\Prescription\Entities\ProductGroup;
use Modules\Prescription\Entities\Drug;
use Modules\Prescription\Entities\Regimen;
use Modules\Prescription\Entities\StockItem;
use Modules\Prescription\Entities\PrescriptionItem;
use Modules\Prescription\Entities\Prescription;
use Modules\Patient\Entities\DSDMType;
use DB;
use Carbon\Carbon;

use Validator, Log;

class PrescriptionController extends Controller
{
     public function __construct(){
     
        $this->middleware(['auth', 'is_locked_out', 'is_approved', 'is_admin']);
    }


    
    //prescription Item functions
        public function createPrescriptionItem(){

            $item = new PrescriptionItem;
            $item->Quantity = request()->quantity;
            $item->NoOfDays = request()->days;
            $item->IssuedDate = Carbon::now();
            $item->PharmacistIssueNotes = request()->abreason;
            $item->UnitPrice = request()->unitprice;
            $item->TotalCost = request()->totalcost;
            
            $item->pidrug()->associate(request()->drugoid);
            $item->pischedule()->associate(request()->schedule);
            $item->save();

            $data = PrescriptionItem::with(['pidrug','pischedule'])->latest('OID')->first();

            return response()->json($data);
        }

        public function deletePrescriptionItem(){
            $data = PrescriptionItem::destroy(request()->id);
        }

    //prescrition functions
        public function prescriptionForEncounter(){
            $data = Prescription::with(['pencounter','pregimen','ppatient','prescriptionitems','prescriptionitems.pidrug','prescriptionitems.pischedule'])->where('Encounter', request()->id)->orderBy('PrescriptionDate', 'desc')->get();
            //$data = Prescription::select()->where('Encounter', request()->id)->get();
            return response()->json($data);
        }
        public function prescriptions()
        {   
            
            return view('prescription::prescriptions');
        }

        public function newPrescriptionForm()
        {
            $regimens = Regimen::all();
            $fundings = FundingSource::all();
            $schedules = Schedule::all();
            $drugs = Drug::all();
            $dsdms = DSDMType::all();
            return view('prescription::newprescription',compact('regimens','dsdms','fundings','schedules'));
        }

        public function editPrescription()
        {
            $data = Prescription::with(['pencounter','pregimen','ppatient','prescriptionitems','prescriptionitems.pidrug','prescriptionitems.pischedule'])->where('OID', request()->id)->get();
            return response()->json($data);
        }

        public function updatePrescription()
        {
            
            DB::table('prescription') ->where('OID', request()->prescription_no)->update(['Notes' =>request()->notes, 'PharmacyVisit'=>request()->pharmacyvisit, 'AntibioticReason'=>request()->abreason,'DSDM_Type'=>request()->dsdmtype]);

            $prescription = Prescription::find(request()->prescription_no);
            $prescription->pencounter()->associate(request()->encounterno);
            $prescription->ppatient()->associate(request()->idcno);
            $prescription->pregimen()->associate(request()->currentartregimen);
            //$prescription->pprovider()->associate(Auth()->user()->OID);

            $prescription->save();
            //Log::info(request()->itemOID);
            if(request()->itemOID){
                foreach(request()->itemOID as $item)
                {
                    $prescriptionitem = PrescriptionItem::find($item);
                    $prescriptionitem->piprescription()->associate($prescription);
                    $prescriptionitem->save();
                }
            }


        }

        public function deletePrescription()
        {
            $data = Prescription::destroy(request()->id);

        }
        public function createPrescription(){

            $prescription = new Prescription;
            $prescription->PrescriptionDate = Carbon::now();;
            $prescription->Notes = request()->notes;
            $prescription->PharmacyVisit = request()->pharmacyvisit;
            $prescription->AntibioticReason = request()->abreason;
            $prescription->DSDM_Type = request()->dsdmtype;
            
            $prescription->pencounter()->associate(request()->encounterno);
            $prescription->ppatient()->associate(request()->idcno);
            $prescription->pregimen()->associate(request()->currentartregimen);
            //$prescription->pprovider()->associate(Auth()->user()->OID);

            $prescription->save();
            //Log::info(request()->itemOID);
            if(request()->itemOID){
                foreach(request()->itemOID as $item)
                {
                    $prescriptionitem = PrescriptionItem::find($item);
                    $prescriptionitem->piprescription()->associate($prescription);
                    $prescriptionitem->save();
                }
            }

        }

    //Store Functions
        public function getAllStores(){
            $data = Store::select('OID','Name','IsMain','Active')->get();
            return response()->json($data);
        }

        public function newStoreForm()
        {
            return view('prescription::newstore');

        }

        public function deleteStore(){
            Store::destroy(request()->id);
            $data = Store::all();
            return response()->json($data);
        }

        public function CreateStore()
        {
             $validator = Validator::make(request()->all(), ['storename' => 'required|unique:Store,Name',]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $store = new Store;
                $store->Name = request()->storename;
                $store->Active = request()->isactive;
                $store->IsMain = request()->ismain;
                $store->save();
            }

        }

    //Funding Source Functions
        public function getAllFundingSources(){
            $data = FundingSource::select('OID','Code','Name')->get();
            return response()->json($data);
        }

        public function newFundingSourceForm()
        {
            return view('prescription::newfundingsource');

        }

        public function deleteFundingSource(){
            FundingSource::destroy(request()->id);
            $data = FundingSource::all();
            return response()->json($data);
        }

        public function createFundingSource()
        {
             $validator = Validator::make(request()->all(), ['fundingsourcename' => 'required|unique:FundingSource,Name',]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $fundingsoure = new FundingSource;
                $fundingsoure->Name = request()->fundingsourcename;
                $fundingsoure->Code = request()->code;
                $fundingsoure->Specifiable = request()->specifiable;
                $fundingsoure->save();
            }

        }

    //Condition Functions
        public function getAllConditions(){
            $data = Condition::select('OID','Name')->get();
            return response()->json($data);
        }

        public function newConditionForm()
        {
            return view('prescription::newcondition');

        }

        public function deleteCondition(){
            Condition::destroy(request()->id);
            $data = Condition::all();
            return response()->json($data);
        }

        public function createCondition()
        {
             $validator = Validator::make(request()->all(), ['conditionname' => 'required|unique:Location,Name',]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $condition = new Condition;
                $condition->Name = request()->conditionname;
                $condition->save();
            }

        }

    //Location Functions
        public function getAllLocations(){
            $data = Location::select('OID','Name','Store')->with(['stores'])->get();
            return response()->json($data);
        }

        public function newLocationForm()
        {
            $stores = Store::all();
            return view('prescription::newlocation',compact('stores'));

        }

        public function deleteLocation(){
            Location::destroy(request()->id);
            $data = Location::all();
            return response()->json($data);
        }

        public function createLocation()
        {
             $validator = Validator::make(request()->all(), [
                'locationname' => 'required|unique:Location,Name',
                'store'=>'required',
            ]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $location = new Location;
                $location->Name = request()->locationname;
                $store = Store::find(request()->store);
                //$store->location()->associate($location);
                $location->stores()->associate($store);
                $location->save();
            }

        }

    //Unit Description Functions
        public function getAllUnitDescriptions(){
            $data = UnitDescription::select('OID','Name','ShortName')->get();
            return response()->json($data);
        }

        public function newUnitDescriptionForm()
        {
            return view('prescription::newunitdescription');
        }

        public function deleteUnitDescription(){
            UnitDescription::destroy(request()->id);
            $data = UnitDescription::all();
            return response()->json($data);
        }

        public function createUnitDescription()
        {
             $validator = Validator::make(request()->all(), [
                'unitdescriptionname' => 'required|unique:UnitDescription,Name',
                'shortname' => 'required|unique:UnitDescription,ShortName'
            ]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $unitdescription = new UnitDescription;
                $unitdescription->Name = request()->unitdescriptionname;
                $unitdescription->ShortName = request()->shortname;
                $unitdescription->save();
            }

        }

    //Unit of Measurement Functions
        public function getAllUnitsOfMeasurement(){
            $data = UnitOfMeasurement::select('OID','Name','ShortName')->get();
            return response()->json($data);
        }

        public function newUnitOfMeasurementForm()
        {
            return view('prescription::newunitofmeasurement');

        }

        public function deleteUnitOfMeasurement(){
            UnitOfMeasurement::destroy(request()->id);
            $data = UnitOfMeasurement::all();
            return response()->json($data);
        }

        public function createUnitOfMeasurement()
        {
             $validator = Validator::make(request()->all(), [
                'unitofmeasurement' => 'required|unique:UnitOfMeasurement,Name',
                'shortname' => 'required|unique:UnitOfMeasurement,ShortName',
            ]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $unitofmeasurement = new UnitOfMeasurement;
                $unitofmeasurement->Name = request()->unitofmeasurement;
                $unitofmeasurement->ShortName = request()->shortname;
                $unitofmeasurement->Decomposable = request()->decomposable;
                $unitofmeasurement->save();
            }

        }

    //Schedule Functions
        public function getAllSchedules(){
            $data = Schedule::select('OID','Code','Frequency')->get();
            return response()->json($data);
        }

        public function newScheduleForm()
        {
            return view('prescription::newschedule');

        }

        public function deleteSchedule(){
            Schedule::destroy(request()->id);
            $data = Schedule::all();
            return response()->json($data);
        }

        public function createSchedule()
        {
             $validator = Validator::make(request()->all(), [
                'code' => 'required|unique:Schedule,Code',
                'frequency' => 'required',
            ]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $schedule = new Schedule;
                $schedule->Frequency = request()->frequency;
                $schedule->Code = request()->code;
                $schedule->save();
            }

        }

    //Product Group Functions
        public function getAllProductGroups(){
            $data = ProductGroup::select('OID','Name')->get();
            return response()->json($data);
        }

        public function newProductGroupForm()
        {
            return view('prescription::newproductgroup');

        }

        public function deleteProductGroup(){
            ProductGroup::destroy(request()->id);
            $data = ProductGroup::all();
            return response()->json($data);
        }

        public function createProductGroup()
        {
             $validator = Validator::make(request()->all(), [
                'productgroupname' => 'required|unique:ProductGroup,Name',
            ]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $schedule = new ProductGroup;
                $schedule->Name = request()->productgroupname;
                $schedule->save();
            }

        }

    //Drug Functions
        public function getAllDrugs(){
            //$data = Drug::all();
            $data = Drug::select('OID','DrugName','Dose','UnitPrice',DB::raw("
                (case Preparation 
                when '1' then 'Tablet'
                when '2' then 'Capsule'
                when '3' then 'Solution'
                when '4' then 'Injectible in ampule or vial'
                when '5' then 'Syrup'
                when '6' then 'Intravenus'
                when '7' then 'Cream'
                when '8' then 'Ointment'
                when '9' then 'Pessarie'
                when '10' then 'Drops'
                when '11' then 'Mixture'
                when '12' then 'Suppository'
                when 'null' then '-'
        end
        ) as Preparation,
        (case Measurement 
                when '1' then 'Milligrams'
                when '2' then 'Millilitres'
                when '3' then 'International Units'
                when '4' then 'Tube'
                when '5' then 'Micro Units'
                when '6' then 'Percentage'
                when '7' then 'Litres'
                when '8' then 'Kilograms'
                when '9' then 'Milligrams per Ml'

        end) as Measurement,
        (case MediType 
                when '1' then 'ARV'
                when '2' then 'Non-ARV'
        end) as MediType,
        (case ForSale 
                when '1' then 'Yes'
                when '2' then 'No'
        end
        ) as ForSale,
         COALESCE(ShortName,'-')as ShortName "))
        ->get();
            return response()->json($data);
        }

        public function newDrugForm()
        {
            return view('prescription::newdrug');

        }

        public function deleteDrug(){
            Drug::destroy(request()->id);
            $data = Drug::all();
            return response()->json($data);
        }

        public function createDrug()
        {
             $validator = Validator::make(request()->all(), [
                'drugname' => 'required|unique:Drug,DrugName',
            ]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $schedule = new Drug;
                $schedule->DrugName = request()->drugname;
                $schedule->Dose = request()->dose;
                $schedule->Preparation = request()->preparation;
                $schedule->Measurement = request()->measurement;
                $schedule->ShortName = request()->shortname;
                $schedule->MediType = request()->medicinetype;       
                $schedule->NavCode = request()->navisioncode;
                $schedule->ForSale = request()->forsale;
                $schedule->UnitPrice = request()->unitprice;
                //$schedule->groupidForConversion = request()->productgroupname;
                //$schedule->PMargin = request()->productgroupname;
                $schedule->save();
            }

        }
        public function SelectDrug(){
            if(request()->get('query'))
            {
                $query = request()->get('query');
                $data = DB::table('Drug')->where('DrugName', 'LIKE', "%{$query}%")->get();

                //return response()->json($data);

                $output = '<ul class="dropdown-menu" style="display:block; position:relative;width: 100%;margin-top:24px;  font-size: 1.2em; min-width:202px">';
                foreach($data as $row)
                {
                    $output .= '<li style="text-align:left !important; cursor: pointer;"><input type="hidden" value="'. $row->Preparation .'" name="prep"><input type="hidden" value="'. $row->UnitPrice .'" name="uprice"><input type="hidden" value="'. $row->OID .'" name="oid"><input type="hidden" value="'. $row->Dose .'" name="dose"><a>'.$row->DrugName.'</a></li>';
                }
                $output .= '</ul>';
                echo $output;
            }
        }

    //Regimen Functions
        public function getAllRegimens(){
            $data = Regimen::select('OID','Code',DB::raw("
                (case Type 
                when '1' then 'ARV'
                when '2' then 'TB'
                when 'null' then '-'
                end
                ) as Type"))
                ->get();
            return response()->json($data);
        }

        public function newRegimenForm()
        {
             $drugs = Drug::all();
            return view('prescription::newregimen', compact('drugs'));

        }

        public function deleteRegimen(){
            Regimen::destroy(request()->id);
            $data = Regimen::all();
            return response()->json($data);
        }

        public function createRegimen()
        {
             $validator = Validator::make(request()->all(), [
                'code' => 'required|unique:Regimen,Code',
                'regimentype' => 'required',
                'drugs'=>'required',
            ]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $regimen = new Regimen;
                $regimen->Code = request()->code;
                //$regimen->FormattedCode = request()->dose;
                $regimen->Type = request()->regimentype;
                //$regimen->OnPrePrinted = request()->measurement;
                $regimen->save();
                if(request()->drugs){
                    foreach(request()->drugs as $drug)
                    {   
                        $drug = Drug::find($drug);
                        $drug->regimen()->attach($regimen);
                        $drug->save();
                        
                    }
                }
            }
        }

    //stock Functions
        public function stockItems()
        {
            $stockitems = StockItem::with(['_drug','_fundingsource','_unitdescription','_location'])->get();
            return view('prescription::inventory.stock',compact('stockitems'));
        }

         public function newItemForm()
         {
            $drugs = Drug::all();
            $fundingsources = FundingSource::all();
            $productgroups = ProductGroup::all();
            $measureunits = UnitOfMeasurement::all();
            $unitdescriptions = UnitDescription::all();
            $conditions = Condition::all();
            $locations = Location::all();
            return view('prescription::inventory.newitem', compact('drugs','fundingsources','productgroups','measureunits','unitdescriptions','conditions','locations'));
        }

        public function createStockItem()
        {
            $validator = Validator::make(request()->all(), [
                'itemdescription' => 'required',
            ]);

            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            else{
                $stockitem = new StockItem;
                $stockitem->BarCode = request()->barcode;
                $stockitem->Description = request()->itemdescription;
                $stockitem->QPU = request()->quantityperunit;
                $stockitem->Active = request()->isative;
                $stockitem->IsDrug = request()->isdrug;

                $stockitem->_drug()->associate(Drug::find(request()->drug));
                $stockitem->_fundingsource()->associate(FundingSource::find(request()->fundingsource));
                $stockitem->_unitdescription()->associate(UnitDescription::find(request()->unitdescription));
                $stockitem->_location()->associate(Location::find(request()->location));
                $stockitem->_unitofmeasurement()->associate(UnitOfMeasurement::find(request()->measureunit));
                $stockitem->_productgroup()->associate(ProductGroup::find(request()->productgroup));
                $stockitem->_condition()->associate(Location::find(request()->condition));

                $stockitem->save();
            }
        }

        public function editStockItem(){

        }

        public function deleteStockItem(){
            
        }
}
