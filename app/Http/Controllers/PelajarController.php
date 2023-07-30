<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelajar = DB::table('pelajar')
            ->join('persons', 'pelajar.person_uuid', '=', 'persons.uuid')
            ->join('lembaga', 'pelajar.lembaga_id', '=', 'lembaga.id')
            ->join('kelas', 'pelajar.kelas_id', '=', 'kelas.id')
            ->select('pelajar.*', 'persons.*', 'lembaga.*', 'kelas.*', 'persons.nama as persons_nama', 'lembaga.nama as lembaga_nama', 'kelas.nama as kelas_nama')
            ->orderByDesc('pelajar.updated_at')
            ->get();

        $data = [
            'title' => 'Data Pelajar',
            'pelajar' => $pelajar
        ];

        return view('pelajar.index', $data);
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
            'lembaga' => DB::table('lembaga')->get(),
        ];

        return view('pelajar.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($uuid, Request $request)
    {
        // pembuatan nis otomatis
        $angka = DB::table('pelajar')->max('nis');
        if ($angka == null) {
            $nomerTerakhir = 2022080000;
        } else {
            $nomerTerakhir = $angka;
        }

        $nomerBaru = substr($nomerTerakhir, 0, 4) + 1;
        $length = (strlen($nomerBaru));
        if ($length == 1) {
            $nis = "000" . $nomerBaru;
        } elseif ($length == 2) {
            $nis = "00" . $nomerBaru;
        } elseif ($length == 3) {
            $nis = "0" . $nomerBaru;
        } else {
            $nis = $nomerBaru;
        }

        $fixNis = $nis . "0" . $request->input('lembaga_id') . date('m') . date('Y');

        $validated = $request->validate([
            'person_uuid' => 'required',
            'nisn' => 'required|unique:pelajar|numeric',
            'lembaga_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $validated['nis'] = $fixNis;
        $validated['created_by'] = auth()->user()->person_uuid;
        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['created_at'] = new DateTime();
        $validated['updated_at'] = new DateTime();

        DB::table('pelajar')->insert($validated);

        $request->session()->flash('success', 'Pendidikan Berhasil ditambahkan');

        return redirect('/person' . "/" . $uuid . "/detail");
    }

    public function edit($id)
    { {
            $data = [
                'title' => 'Formulir',
                'pelajar' => DB::table('pelajar')->where('pelajar.id', $id)
                    ->join('lembaga', 'pelajar.lembaga_id', '=', 'lembaga.id')
                    ->join('kelas', 'pelajar.kelas_id', '=', 'kelas.id')
                    ->select('pelajar.*', 'lembaga.*', 'kelas.*', 'pelajar.id as pelajar_id', 'lembaga.nama as lembaga_nama', 'kelas.nama as kelas_nama')
                    ->first(),
                'lembaga' => DB::table('lembaga')->get(),
            ];

            return view('pelajar.edit', $data);
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
            'nisn' => ['required', 'numeric', Rule::unique('pelajar', 'nisn')->ignore($id)],
            'lembaga_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['updated_at'] = new DateTime();

        DB::table('pelajar')->where('id', $id)->update($validated);

        $request->session()->flash('success', 'Pendidikan Berhasil diubah');

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
