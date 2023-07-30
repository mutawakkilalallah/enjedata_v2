<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = DB::table('jabatan')
            ->orderBy('golongan')
            ->get();
        $data = [
            'title' => 'Data Jabatan',
            'jabatan' => $jabatan
        ];

        return view('jabatan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Jabatan',
        ];

        return view('jabatan.create', $data);
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
            'golongan' => 'required',
            'kategori' => 'required',
            'nama' => 'required',
        ]);

        $validated['created_by'] = auth()->user()->person_uuid;
        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['created_at'] = new DateTime();
        $validated['updated_at'] = new DateTime();

        DB::table('jabatan')->insert($validated);

        $request->session()->flash('success', 'Jabatan Berhasil ditambahkan');

        return redirect('/jabatan');
    }

    public function edit($id)
    {
        $jabatan = DB::table('jabatan')
            ->where('id', $id)
            ->first();
        $data = [
            'title' => 'Data Jabatan',
            'j' => $jabatan,
        ];

        return view('jabatan.edit', $data);
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
            'golongan' => 'required',
            'kategori' => 'required',
            'nama' => 'required',
        ]);

        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['updated_at'] = new DateTime();

        DB::table('jabatan')->where('id', $id)->update($validated);

        $request->session()->flash('success', 'Jabatan Berhasil diubah');

        return redirect('/jabatan');
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
