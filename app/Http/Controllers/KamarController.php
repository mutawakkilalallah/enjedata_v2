<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = DB::table('kamar')
            ->join('wilayah', 'kamar.wilayah_id', '=', 'wilayah.id')
            ->select('wilayah.*', 'kamar.*', 'wilayah.nama as wilayah')
            ->orderByDesc('kamar.updated_at')
            ->get();
        $data = [
            'title' => 'Data Kamar',
            'kamar' => $kamar
        ];

        return view('kamar.index', $data);
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
            'wilayah' => DB::table('wilayah')->get()
        ];

        return view('kamar.create', $data);
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
            'wilayah_id' => 'required',
            'nama' => 'required',
        ]);

        $validated['created_by'] = auth()->user()->person_uuid;
        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['created_at'] = new DateTime();
        $validated['updated_at'] = new DateTime();

        DB::table('kamar')->insert($validated);

        $request->session()->flash('success', 'Kamar Berhasil ditambahkan');

        return redirect('/kamar');
    }

    public function edit($id)
    {
        $kamar = DB::table('kamar')
            ->join('wilayah', 'kamar.wilayah_id', '=', 'wilayah.id')
            ->select('wilayah.*', 'kamar.*', 'wilayah.nama as wilayah_nama', 'wilayah.id as wilayah_id')
            ->where('kamar.id', $id)
            ->first();
        $data = [
            'title' => 'Data kamar',
            'wilayah' => DB::table('wilayah')->get(),
            'k' => $kamar,
        ];

        return view('kamar.edit', $data);
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
            'nama' => 'required',
        ]);

        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['updated_at'] = new DateTime();

        DB::table('kamar')->where('id', $id)->update($validated);

        $request->session()->flash('success', 'Kamar Berhasil diubah');

        return redirect('/kamar');
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

    // kamarJSON
    public function getKamar($id)
    {
        $kamar = DB::table('kamar')
            ->where('wilayah_id', $id)
            ->orderByDesc('created_at')
            ->get();

        return response()->json($kamar);
    }
}
