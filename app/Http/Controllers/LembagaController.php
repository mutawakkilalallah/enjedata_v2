<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lembaga = DB::table('lembaga')
            ->orderByDesc('updated_at')
            ->get();
        $data = [
            'title' => 'Data Lembaga',
            'lembaga' => $lembaga
        ];

        return view('lembaga.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Lembaga',
        ];

        return view('lembaga.create', $data);
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

        DB::table('lembaga')->insert($validated);

        $request->session()->flash('success', 'Lembaga Berhasil ditambahkan');

        return redirect('/lembaga');
    }

    public function edit($id)
    {
        $lembaga = DB::table('lembaga')
            ->where('id', $id)
            ->first();
        $data = [
            'title' => 'Data lembaga',
            'l' => $lembaga,
        ];

        return view('lembaga.edit', $data);
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

        DB::table('lembaga')->where('id', $id)->update($validated);

        $request->session()->flash('success', 'Lembaga Berhasil diubah');

        return redirect('/lembaga');
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
