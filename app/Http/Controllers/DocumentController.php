<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function create($uuid)
    {
        $data = [
            'title' => 'Upload Berkas',
            'uuid' => $uuid
        ];

        return view('document.create', $data);
    }

    public function upload(Request $request, $uuid)
    {
        $validated = $request->validate([
            'path' => 'required|image',
            'person_uuid' => 'required',
            'type' => 'required',
        ]);

        $validated['path'] = $request->file('path')->store($request->input('type'));

        $validated['created_by'] = auth()->user()->person_uuid;
        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['created_at'] = new DateTime();
        $validated['updated_at'] = new DateTime();

        DB::table('documents')->insert($validated);

        $request->session()->flash('success', 'Berkas Berhasil diupload');

        return redirect('/person' . "/" . $uuid . "/detail");
    }

    public function delete($id)
    {
        $document = DB::table('documents')->where('id', $id)->first();

        Storage::delete($document->path);

        DB::table('documents')->where('id', $id)->delete();


        return redirect('/person' . "/" . $document->person_uuid . "/detail");
    }

    public function download($id)
    {

        $document = DB::table('documents')->where('id', $id)
        ->first();

        return response()->download("storage/" . $document->path);
    }

    public function viewAll($kategory)
    {

        $documents = DB::table('documents')
        ->where('type', $kategory)
        ->orderByDesc('created_at')
        ->get();

        $data = [
            'title' => 'Daftar Berkas ' . '(' . $documents->count() . ')',
            'documents' => $documents
        ];

        return view('document.view', $data);
    }
}
