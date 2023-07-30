<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    public function cities($id)
    {
        $cities = DB::table('cities')->where('prov_id', $id)->get();

        return response()->json($cities);
    }

    public function districts($id)
    {
        $districts = DB::table('districts')->where('city_id', $id)->get();

        return response()->json($districts);
    }

    public function subdistricts($id)
    {
        $subdistricts = DB::table('subdistricts')->where('dis_id', $id)->get();

        return response()->json($subdistricts);
    }
}
