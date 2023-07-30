<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wilayah = DB::table('wilayah')
            ->orderByDesc('updated_at')
            ->get();
        $data = [
            'title' => 'Data Wilayah',
            'wilayah' => $wilayah
        ];

        return view('wilayah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Wilayah',
        ];

        return view('wilayah.create', $data);
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
            'nama' => 'required',
        ]);

        $validated['created_by'] = auth()->user()->person_uuid;
        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['created_at'] = new DateTime();
        $validated['updated_at'] = new DateTime();

        DB::table('wilayah')->insert($validated);

        $request->session()->flash('success', 'Wilayah Berhasil ditambahkan');

        return redirect('/wilayah');
    }

    public function edit($id)
    {
        $wilayah = DB::table('wilayah')
            ->where('id', $id)
            ->first();
        $data = [
            'title' => 'Data Wilayah',
            'w' => $wilayah,
        ];

        return view('wilayah.edit', $data);
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
            'nama' => 'required',
        ]);

        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['updated_at'] = new DateTime();

        DB::table('wilayah')->where('id', $id)->update($validated);

        $request->session()->flash('success', 'Wilayah Berhasil diubah');

        return redirect('/wilayah');
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
