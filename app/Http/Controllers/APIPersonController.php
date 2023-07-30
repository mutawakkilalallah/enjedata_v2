<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class APIPersonController extends Controller
{
    public function getAll()
    {
        $persons = DB::table('persons')
            ->join('provinces', 'persons.prov_id', '=', 'provinces.prov_id')
            ->join('cities', 'persons.kab_id', '=', 'city_id')
            ->join('districts', 'persons.kec_id', '=', 'dis_id')
            ->join('subdistricts', 'persons.desa_id', '=', 'subdis_id')
            ->orderByDesc('updated_at')
            ->paginate(20);

        return response($persons);
    }

    public function getDetail($uuid)
    {
        $person = DB::table('persons')
            ->where('uuid', $uuid)
            ->join('provinces', 'persons.prov_id', '=', 'provinces.prov_id')
            ->join('cities', 'persons.kab_id', '=', 'city_id')
            ->join('districts', 'persons.kec_id', '=', 'dis_id')
            ->join('subdistricts', 'persons.desa_id', '=', 'subdis_id')
            ->first();

        $fotoDiri = DB::table('documents')
            ->where('person_uuid', $uuid)
            ->where('type', 'foto-diri')
            ->orderByDesc('created_at')
            ->first();

        $data = [
            'p' => $person,
            'fd' => $fotoDiri,
        ];

        return response($data);
    }
}
