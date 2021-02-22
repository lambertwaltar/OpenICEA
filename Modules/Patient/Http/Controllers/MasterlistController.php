<?php

namespace Modules\Patient\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Patient\Entities\Country;
use Modules\Patient\Entities\District;
use Modules\Patient\Entities\Subcounty;
use Modules\Patient\Entities\Parish;
use Modules\Patient\Entities\Village;
use Modules\Patient\Entities\County;
use Modules\Patient\Entities\Religion;
use Modules\Patient\Entities\Tribe;
use Log;


class MasterlistController extends Controller
{
    
    //=====================Master list functions
    //apply middleware to constructor
    public function __construct(){   
        // $this->middleware(['auth', 'is_locked_out', 'is_approved']);
        $this->middleware(['auth', 'is_locked_out', 'is_approved', 'permission:administrator']);
    }

    public function getAllTribes(){
        $data = Tribe::select('OID','Name')->get();
        return response()->json($data);
    }

    public function getAllReligions(){
        $data = Religion::select('OID','Name')->get();
        return response()->json($data);
    }

    public function getAllDistricts() //pick content for dropdown
    {
        $data = District::select('OID','Name','Country')->with(['dcountry'])->get();
        Log::info($data);
        return response()->json($data);
    }

     public function getAllCounties()
    {
        $data = County::select('OID','Name','District')->with(['_district'])->get();
        return response()->json($data);
    }

    public function getAllSubcounties()
    {
        $data = Subcounty::select('OID','Name','County')->with(['_county'])->get();
        return response()->json($data);
    }

    public function getAllParishes()
    {
        $data = Parish::select('OID','Name','SubCounty')->with(['_subcounty'])->get();
        return response()->json($data);
    }

    public function getAllVillages() 
    {
        $data = Village::select('OID','Name','Parish')->with(['_parish'])->get();
        return response()->json($data);
    }

    //=====================Master list functions
}
