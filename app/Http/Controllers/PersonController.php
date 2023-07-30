<?php

namespace App\Http\Controllers;

use App\Models\Document;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PersonController extends Controller
{
    public function index()
    {
        $persons = DB::table('persons')
            ->join('provinces', 'persons.prov_id', '=', 'provinces.prov_id')
            ->join('cities', 'persons.kab_id', '=', 'city_id')
            ->join('districts', 'persons.kec_id', '=', 'dis_id')
            ->join('subdistricts', 'persons.desa_id', '=', 'subdis_id')
            ->orderByDesc('updated_at')
            ->get();
        $data = [
            'title' => 'Data Person',
            'persons' => $persons
        ];

        return view('person.index', $data);
    }

    public function show($uuid)
    {
        $person = DB::table('persons')
            ->where('uuid', $uuid)
            ->join('provinces', 'persons.prov_id', '=', 'provinces.prov_id')
            ->join('cities', 'persons.kab_id', '=', 'city_id')
            ->join('districts', 'persons.kec_id', '=', 'dis_id')
            ->join('subdistricts', 'persons.desa_id', '=', 'subdis_id')
            ->first();

        $documents = DB::table('documents')
            ->where('person_uuid', $uuid)
            ->get();

        $fotoDiri = DB::table('documents')
            ->where('person_uuid', $uuid)
            ->where('type', 'foto-diri')
            ->orderByDesc('created_at')
            ->first();

        $pendidikan = DB::table('pelajar')
            ->join('lembaga', 'pelajar.lembaga_id', '=', 'lembaga.id')
            ->join('kelas', 'pelajar.kelas_id', '=', 'kelas.id')
            ->select('pelajar.*', 'lembaga.*', 'kelas.*', 'pelajar.id as pelajar_id', 'lembaga.nama as lembaga_nama', 'kelas.nama as kelas_nama')
            ->where('person_uuid', $uuid)
            ->first();

        $domisili = DB::table('santri')
            ->join('wilayah', 'santri.wilayah_id', '=', 'wilayah.id')
            ->join('kamar', 'santri.kamar_id', '=', 'kamar.id')
            ->select('santri.*', 'wilayah.*', 'kamar.*', 'santri.id as santri_id', 'wilayah.nama as wilayah_nama', 'kamar.nama as kamar_nama')
            ->where('person_uuid', $uuid)
            ->first();

        $pengurus = DB::table('pengurus')
            ->join('jabatan', 'pengurus.jabatan_id', '=', 'jabatan.id')
            ->select('pengurus.*', 'jabatan.*', 'pengurus.id as pengurus_id', 'jabatan.nama as jabatan_nama')
            ->where('person_uuid', $uuid)
            ->first();

        $karyawan = DB::table('karyawan')
            ->join('jabatan', 'karyawan.jabatan_id', '=', 'jabatan.id')
            ->select('karyawan.*', 'jabatan.*', 'karyawan.id as karyawan_id', 'jabatan.nama as jabatan_nama')
            ->where('person_uuid', $uuid)
            ->first();

        $pembayaran = DB::table('pembayaran')
            ->where('person_uuid', $uuid)
            ->orderByDesc('created_at')
            ->get();

        $data = [
            'title' => 'Formulir',
            'p' => $person,
            'documents' => $documents,
            'fd' => $fotoDiri,
            'pendidikan' => $pendidikan,
            'domisili' => $domisili,
            'pengurus' => $pengurus,
            'karyawan' => $karyawan,
            'pembayaran' => $pembayaran
        ];

        return view('person.detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Formulir',
            'provinces' => DB::table('provinces')->get(),
            'cities' => DB::table('cities')->get(),
            'districts' => DB::table('districts')->get(),
            'subdistricts' => DB::table('subdistricts')->get()
        ];

        return view('person.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_kk' => 'required|numeric|digits:16',
            'nik' => 'required|unique:persons|numeric|digits:16',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'prov_id' => 'required',
            'kab_id' => 'required',
            'kec_id' => 'required',
            'desa_id' => 'required',
            'jalan' => 'required',
            'kode_pos' => 'required|numeric|digits:5',
        ]);

        $validated['uuid'] = Str::uuid();
        $validated['created_by'] = auth()->user()->person_uuid;
        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['created_at'] = new DateTime();
        $validated['updated_at'] = new DateTime();

        DB::table('persons')->insert($validated);

        $request->session()->flash('success', 'Person Berhasil ditambahkan');

        return redirect('/person');
    }

    public function edit($uuid)
    {
        $person = DB::table('persons')
            ->where('uuid', $uuid)
            ->join('provinces', 'persons.prov_id', '=', 'provinces.prov_id')
            ->join('cities', 'persons.kab_id', '=', 'city_id')
            ->join('districts', 'persons.kec_id', '=', 'dis_id')
            ->join('subdistricts', 'persons.desa_id', '=', 'subdis_id')
            ->first();
        $data = [
            'title' => 'Formulir',
            'p' => $person,
            'provinces' => DB::table('provinces')->get(),
        ];

        return view('person.edit', $data);
    }

    public function update(Request $request, $uuid)
    {
        $validated = $request->validate([
            'no_kk' => 'required|numeric|digits:16',
            'nik' => 'required|numeric|digits:16',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'prov_id' => 'required',
            'kab_id' => 'required',
            'kec_id' => 'required',
            'desa_id' => 'required',
            'jalan' => 'required',
            'kode_pos' => 'required|numeric|digits:5',
        ]);

        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['updated_at'] = new DateTime();

        DB::table('persons')->where('uuid', $uuid)->update($validated);

        $request->session()->flash('success', 'Person Berhasil diubah');

        return redirect('/person' . "/" . $uuid . "/detail");
    }
}
