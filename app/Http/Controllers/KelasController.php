<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = DB::table('kelas')
            ->join('lembaga', 'kelas.lembaga_id', '=', 'lembaga.id')
            ->select('lembaga.*', 'kelas.*', 'lembaga.nama as lembaga')
            ->orderByDesc('kelas.updated_at')
            ->get();
        $data = [
            'title' => 'Data Kelas',
            'kelas' => $kelas
        ];

        return view('kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Kelas',
            'lembaga' => DB::table('lembaga')->get()
        ];

        return view('kelas.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lembaga_id' => 'required',
            'nama' => 'required',
        ]);

        $validated['created_by'] = auth()->user()->person_uuid;
        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['created_at'] = new DateTime();
        $validated['updated_at'] = new DateTime();

        DB::table('kelas')->insert($validated);

        $request->session()->flash('success', 'Kelas Berhasil ditambahkan');

        return redirect('/kelas');
    }

    public function edit($id)
    {
        $kelas = DB::table('kelas')
            ->join('lembaga', 'kelas.lembaga_id', '=', 'lembaga.id')
            ->select('lembaga.*', 'kelas.*', 'lembaga.nama as lembaga_nama', 'lembaga.id as lembaga_id')
            ->where('kelas.id', $id)
            ->first();
        $data = [
            'title' => 'Data Kelas',
            'lembaga' => DB::table('lembaga')->get(),
            'k' => $kelas,
        ];

        return view('kelas.edit', $data);
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
            'lembaga_id' => 'required',
            'nama' => 'required',
        ]);

        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['updated_at'] = new DateTime();

        DB::table('kelas')->where('id', $id)->update($validated);

        $request->session()->flash('success', 'Kelas Berhasil diubah');

        return redirect('/kelas');
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

    // kelasJSON
    public function getKelas($id)
    {
        $kelas = DB::table('kelas')
            ->where('lembaga_id', $id)
            ->orderByDesc('created_at')
            ->get();

        return response()->json($kelas);
    }
}
