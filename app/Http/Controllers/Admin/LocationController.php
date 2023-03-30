<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Services\VnCommuneService;
use App\Http\Services\VnDistrictService;
use App\Http\Services\VnProvinceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class LocationController extends Controller
{


    //list
    public function getDistrict( Request $request)
    {
        $district = new VnDistrictService();

        return response()->json([
            'status' => true,
            'data' => $district->getByProvince($request ->id),
        ]);

    }

    public function getCommune(Request $request)
    {
        $commune = new VnCommuneService();

        return response()->json([
            'status' => true,
            'data' => $commune->getByDistrict($request ->id),
        ]);
    }




}
