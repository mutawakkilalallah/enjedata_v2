<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = DB::table('karyawan')
            ->join('persons', 'karyawan.person_uuid', '=', 'persons.uuid')
            ->join('jabatan', 'karyawan.jabatan_id', '=', 'jabatan.id')
            ->select('karyawan.*', 'persons.*', 'jabatan.*', 'persons.nama as persons_nama', 'jabatan.nama as jabatan_nama',)
            ->orderBy('jabatan.golongan')
            ->get();

        $data = [
            'title' => 'Data Karyawan',
            'karyawan' => $karyawan
        ];

        return view('karyawan.index', $data);
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
            'jabatan' => DB::table('jabatan')->where('kategori', 'karyawan')->orderBy('golongan')->get(),
        ];

        return view('karyawan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($uuid, Request $request)
    {
        // pembuatan nip otomatis
        $angka = DB::table('karyawan')->max('nip');
        if ($angka == null) {
            $nomerTerakhir = "NJ-082022000";
        } else {
            $nomerTerakhir = $angka;
        }

        $nomerBaru = substr($nomerTerakhir, 9, 4) + 1;
        $length = (strlen($nomerBaru));
        if ($length == 1) {
            $nip = "000" . $nomerBaru;
        } elseif ($length == 2) {
            $nip = "00" . $nomerBaru;
        } elseif ($length == 3) {
            $nip = "0" . $nomerBaru;
        } else {
            $nip = $nomerBaru;
        }

        $fixNip = "NJ-" . date('m') . date('Y') . $nip;

        $validated = $request->validate([
            'person_uuid' => 'required',
            'jabatan_id' => 'required',
            'ket' => 'required',
        ]);

        $validated['nip'] = $fixNip;
        $validated['created_by'] = auth()->user()->person_uuid;
        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['created_at'] = new DateTime();
        $validated['updated_at'] = new DateTime();

        DB::table('karyawan')->insert($validated);

        $request->session()->flash('success', 'Jabatan Berhasil ditambahkan');

        return redirect('/person' . "/" . $uuid . "/detail");
    }

    public function edit($id)
    { {
            $data = [
                'title' => 'Formulir',
                'karyawan' => DB::table('karyawan')->where('karyawan.id', $id)
                    ->join('jabatan', 'karyawan.jabatan_id', '=', 'jabatan.id')
                    ->select('karyawan.*', 'jabatan.*', 'karyawan.id as karyawan_id', 'jabatan.nama as jabatan_nama',)
                    ->first(),
                'jabatan' => DB::table('jabatan')->where('kategori', 'karyawan')->orderBy('golongan')->get(),
            ];

            return view('karyawan.edit', $data);
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
            'jabatan_id' => 'required',
            'ket' => 'required',
        ]);

        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['updated_at'] = new DateTime();

        DB::table('karyawan')->where('id', $id)->update($validated);

        $request->session()->flash('success', 'Jabatan Berhasil diubah');

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
