<?php

namespace App\Http\Controllers;

use App\Http\Resources\DistrictResource;
use App\Http\Resources\DivisionResource;
use App\Http\Resources\UpazilaResource;
use App\Models\District;
use App\Models\Upazila;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getDistrict(Request $request)
    {
        $data=District::where('division_id',$request->division_id)->get();
        return DistrictResource::collection($data);
    }

    public function getUpazila(Request $request)
    {
        $data=Upazila::where('district_id',$request->district_id)->get();
        return UpazilaResource::collection($data);
    }

}
