<?php

namespace Modules\Patient\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Crypt;
use Modules\Patient\Entities\Country;
use Modules\Patient\Entities\District;
use Modules\Patient\Entities\Subcounty;
use Modules\Patient\Entities\Parish;
use Modules\Patient\Entities\Village;
use Modules\Patient\Entities\County;
use Modules\Patient\Entities\Religion;
use Modules\Patient\Entities\Tribe;
use Modules\Patient\Entities\FileData;
use Modules\Patient\Entities\ChartLocation;
use Modules\Patient\Entities\Referral;
use Modules\Patient\Entities\KCCAClinic;
use Validator,Log;

class DemographicsController extends Controller
{
    

//set middleware
    public function __construct(){
        //apply Administrator middleware to controller methods
        $this->middleware(['auth', 'is_locked_out', 'is_approved', 'permission:administrator']);
    }

//==================country =====================
    public function showCountries()
    {
        $countries = Country::all();
        return view('patient::demographics.country', ['countries'=>$countries]);

    }

    public function newCountryForm()
    {
        return view('patient::demographics.newcountry');

    }

    public function newCountry()
    {
         $validator = Validator::make(request()->all(), [ // <---
            'countryname' => 'required|unique:Country,Name', 
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
            $country = new Country;
            $country->Name = request()->countryname;
            $country->save();
        }
        
        //return redirect()->route('countries')->with('success', 'Country successfully created');

    }

    public function deleteCountry()
    {
        $country = Country::destroy(request()->id);
        $data = Country::all();
        return response()->json($data);
    }

    //==================country =====================

//==================district =====================
    public function showDistricts()
    {
        $districts = District::with(['dcountry']);
        dd($districts);
        return view('patient::demographics.district', ['districts'=>$districts]);

    }

    public function newDistrictForm()
    {
        $countries = Country::all();
        return view('patient::demographics.newdistrict', compact('countries'));

    }

    public function newDistrict()
    {

        $validator = Validator::make(request()->all(), [ // <---
            'districtname' => 'required|unique:District,Name',
            'country' => 'required', 
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
            $district = new District;
            $district->Name = request()->districtname;
            $country = Country::find(request()->country);
            $district->dcountry()->associate($country);
            $district->save();
        }

    }

    public function deleteDistrict()
    {
        $district = District::destroy(request()->id);
        $data = District::all();
        return response()->json($data);
    }

    //==================district =====================

//==================County =====================
    public function showCounties()
    {
        $counties = County::all();
        return view('patient::demographics.county', compact('counties'));

    }

    public function newCountyForm()
    {
        $districts = District::all();
        return view('patient::demographics.newcounty', compact('districts'));

    }

    public function newCounty()
    {
        $validator = Validator::make(request()->all(), [ // <---
            'countyname' => 'required|unique:County,Name',
            'district' => 'required', 
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
            $county = new County;
            $county->Name = request()->countyname;
            $district = District::find(request()->district);
            $county->_district()->associate($district);
            $county->save();
        }
    }

    public function deleteCounty()
    {   
        //$id = Crypt::decrypt(request()->id);
        $country = County::destroy(request()->id);
        $data = County::all();
        return response()->json($data);
    }

    //==================County=====================

//==================Subcounty =====================
    public function showSubcounties()
    {
        $subcounties = Subcounty::all();
        return view('patient::demographics.subcounty', compact('subcounties'));

    }

    public function newSubcountyForm()
    {
        $counties = County::all();
        return view('patient::demographics.newsubcounty', compact('counties'));

    }

    public function newSubcounty()
    {

        $validator = Validator::make(request()->all(), [ // <---
            'subcountyname' => 'required|unique:SubCounty,Name',
            'county' => 'required', 
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
            $subcounty = new Subcounty;
            $subcounty->Name = request()->subcountyname;
            $county = County::find(request()->county);
            $subcounty->_county()->associate($county);
            $subcounty->save();
        }
    }

    public function deleteSubcounty()
    {
        
        // $id = Crypt::decrypt(request()->id);
        $country = Subcounty::destroy(request()->id);
        $data = Subcounty::all();
        return response()->json($data);

    }

    //==================subcounty =====================

//==================Parish =====================
    public function showParishes()
    {
        $parishes = Parish::all();
        return view('patient::demographics.parish', compact('parishes'));

    }

    public function newParishForm()
    {
        $subcounties = Subcounty::all();
        return view('patient::demographics.newparish', compact('subcounties'));

    }

    public function newParish()
    {

        $validator = Validator::make(request()->all(), [ // <---
            'parishname' => 'required|unique:Parish,Name',
            'subcounty' => 'required', 
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
            $parish = new Parish;
            $parish->Name = request()->parishname;
            $subcounty = Subcounty::find(request()->subcounty);
            $parish->_subcounty()->associate($subcounty);
            $parish->save();
        }

        
        return redirect()->route('parishes')->with('success', 'Parish successfully created');


    }

    public function deleteParish()
    {
        
        // $id = Crypt::decrypt(request()->id);
        $country = Parish::destroy(request()->id);
        $data = Parish::all();
        return response()->json($data);

    }

    //==================Parish =====================

//==================Village =====================
    public function showVillages()
    {
        $villages = Village::all();
        return view('patient::demographics.village', compact('villages'));

    }

    public function newVillageForm()
    {
        $parishes = Parish::all();
        return view('patient::demographics.newvillage', compact('parishes'));

    }

    public function newVillage()
    {

        $validator = Validator::make(request()->all(), [ // <---
            'villagename' => 'required|unique:Village,Name',
            'parish' => 'required', 
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
            $village = new Village;
            $village->Name = request()->villagename;
            $parish = Parish::find(request()->parish);
            $village->_parish()->associate($parish);
            $village->save();
        }  
    }

    public function deleteVillage()
    {  
        // $id = Crypt::decrypt(request()->id);
        $country = Village::destroy(request()->id);
        $data = Village::all();
        return response()->json($data);
    }

    //==================Village =====================

//==================Religion=====================
    public function showReligions()
    {
        $religions = Religion::all();
        return view('patient::demographics.religion', compact('religions'));
    }

    public function newReligionForm()
    {
        return view('patient::demographics.newreligion');
    }

    public function newReligion()
    {
        $validator = Validator::make(request()->all(), [
            'religionname' => 'required|unique:Religion,Name',
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
            $religion = new Religion;
            $religion->Name = request()->religionname;
            $religion->save();
        } 
    }

    public function deleteReligion()
    { 
        //$id = Crypt::decrypt(request()->id);
        $religion = Religion::destroy(request()->id);
        $data = Religion::all();
        return response()->json($data);
    }

    //==================Religion =====================

//==================Tribe=====================
    public function showTribes()
    {
        $tribes = Tribe::all();
        return view('patient::demographics.tribe', compact('tribes'));
    }

    public function newTribeForm()
    {
        return view('patient::demographics.newtribe');
    }

    public function newTribe()
    {
       $validator = Validator::make(request()->all(), [
            'tribename' => 'required|unique:Tribe,Name',
        ]);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        else{
            $tribe = new Tribe;
            $tribe->Name = request()->tribename;
            $tribe->save();
        } 
    }

    public function deleteTribe()
    { 
        //$id = Crypt::decrypt(request()->id);
        $tribe = Tribe::destroy(request()->id);
        $data = Tribe::all();
        return response()->json($data);
    }

    //==================Tribe =====================

//==================Chart Locations=====================
    public function showChartLocations()
    {
        $chartlocations = ChartLocation::all();
        return view('patient::demographics.chartlocation', compact('chartlocations'));
    }

    public function newChartLocationForm()
    {
        return view('patient::demographics.newchartlocation');
    }

    public function newChartLocation()
    {
        // request()->validate(['chartlocation' => 'required',]);  
        $chartlocation = new ChartLocation;
        $chartlocation->Name = request()->chartlocation;
        $chartlocation->save();
        return redirect()->route('chartlocations')->with('success', 'Chart Location successfully created');
    }

    public function deleteChartLocation()
    { 
        $id = Crypt::decrypt(request()->id);
        $chartlocation = ChartLocation::find($id);
        $chartlocation->delete();
        return redirect()->route('chartlocations')->with('success', 'Chart Location deleted');
    }

    //==================Chart Location =====================

//================== Referral =====================
    public function showReferrals()
    {
        $referrals = Referral::all();
        return view('patient::demographics.referral', compact('referrals'));
    }

    public function newReferralForm()
    {
        return view('patient::demographics.newreferral');
    }

    public function newReferral()
    {
        // request()->validate(['referralname' => 'required',]);  
        $referral = new Referral;
        $referral->Name = request()->referralname;
        $referral->save();
        return redirect()->route('referrals')->with('success', 'Referral successfully created');
    }

    public function deleteReferral()
    { 
        $id = Crypt::decrypt(request()->id);
        $referral = Referral::find($id);
        $referral->delete();
        return redirect()->route('referrals')->with('success', 'Referral deleted');
    }

    //==================Referral =====================


//================== KCCA Clinic =====================
    public function showKCCAClinics()
    {
        $kccaclinics = KCCAClinic::all();
        return view('patient::demographics.kccaclinic', compact('kccaclinics'));
    }

    public function newKCCAClinicForm()
    {
        return view('patient::demographics.newkccaclinic');
    }

    public function newKCCAClinic()
    {
        // request()->validate(['kccaclinicname' => 'required',]);  
        $clinic = new KCCAClinic;
        $clinic->Name = request()->kccaclinicname;
        $clinic->save();
        return redirect()->route('kccaclinics')->with('success', 'KCCA Clinic successfully created');
    }

    public function deleteKCCAClinic()
    { 
        $id = Crypt::decrypt(request()->id);
        $referral = KCCAClinic::find($id);
        $referral->delete();
        return redirect()->route('kccaclinics')->with('success', 'KCCA Clinic deleted');
    }

    //==================KCCA Clinic  =====================



}