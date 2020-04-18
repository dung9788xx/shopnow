<?php

namespace App\Http\Controllers\api;

use App\District;
use App\Http\Controllers\Controller;
use App\Province;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getProvine()
    {
        return response()->json(Province::orderBy('name')->get(),200);
    }

    public function getDistrictByProvince($id)
    {
        return response()->json(Province::find($id)->districts,200);
    }

    public function getWardByDistrict($id)
    {
        return response()->json(District::find($id)->wards,200);
    }
}
