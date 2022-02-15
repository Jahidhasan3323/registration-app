<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Upazila;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getDistrict(Request $request)
    {
        $data=District::where('division_id',$request->division_id)->get();
        return response()->json($data);
    }

    public function getUpazila(Request $request)
    {
        $data=Upazila::where('district_id',$request->district_id)->get();
        return response()->json($data);
    }

}
