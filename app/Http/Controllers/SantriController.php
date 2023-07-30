<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $santri = DB::table('santri')
            ->join('persons', 'santri.person_uuid', '=', 'persons.uuid')
            ->join('wilayah', 'santri.wilayah_id', '=', 'wilayah.id')
            ->join('kamar', 'santri.kamar_id', '=', 'kamar.id')
            ->select('santri.*', 'persons.*', 'wilayah.*', 'kamar.*', 'persons.nama as persons_nama', 'wilayah.nama as wilayah_nama', 'kamar.nama as kamar_nama')
            ->orderByDesc('santri.updated_at')
            ->get();

        $data = [
            'title' => 'Data Santri',
            'santri' => $santri
        ];

        return view('santri.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uuid)
    {
        $data = [
            'title' => 'Formulir',
            'uuid' => $uuid,
            'wilayah' => DB::table('wilayah')->get(),
        ];

        return view('santri.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($uuid, Request $request)
    {
        // pembuatan niup otomatis
        $angka = DB::table('santri')->max('niup');
        if ($angka == null) {
            $nomerTerakhir = 2022080000;
        } else {
            $nomerTerakhir = $angka;
        }

        $nomerBaru = substr($nomerTerakhir, 6, 4) + 1;
        $length = (strlen($nomerBaru));
        if ($length == 1) {
            $niup = "000" . $nomerBaru;
        } elseif ($length == 2) {
            $niup = "00" . $nomerBaru;
        } elseif ($length == 3) {
            $niup = "0" . $nomerBaru;
        } else {
            $niup = $nomerBaru;
        }

        $fixNiup = date('Y') . date('m') . $niup;

        $validated = $request->validate([
            'person_uuid' => 'required',
            'wilayah_id' => 'required',
            'kamar_id' => 'required',
        ]);

        $validated['niup'] = $fixNiup;
        $validated['created_by'] = auth()->user()->person_uuid;
        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['created_at'] = new DateTime();
        $validated['updated_at'] = new DateTime();

        DB::table('santri')->insert($validated);

        $request->session()->flash('success', 'Domisili Berhasil ditambahkan');

        return redirect('/person' . "/" . $uuid . "/detail");
    }

    public function edit($id)
    { {
            $data = [
                'title' => 'Formulir',
                'santri' => DB::table('santri')->where('santri.id', $id)
                    ->join('wilayah', 'santri.wilayah_id', '=', 'wilayah.id')
                    ->join('kamar', 'santri.kamar_id', '=', 'kamar.id')
                    ->select('santri.*', 'wilayah.*', 'kamar.*', 'santri.id as santri_id', 'wilayah.nama as wilayah_nama', 'kamar.nama as kamar_nama')
                    ->first(),
                'wilayah' => DB::table('wilayah')->get(),
            ];

            return view('santri.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'wilayah_id' => 'required',
            'kamar_id' => 'required',
        ]);

        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['updated_at'] = new DateTime();

        DB::table('santri')->where('id', $id)->update($validated);

        $request->session()->flash('success', 'Domisili Berhasil diubah');

        return redirect('/person' . "/" . $request->uuid . "/detail");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
