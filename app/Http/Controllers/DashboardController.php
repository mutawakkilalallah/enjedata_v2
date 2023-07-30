<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'person' => DB::table('persons')->count(),
            'santri' => DB::table('santri')->count(),
            'pelajar' => DB::table('pelajar')->count(),
            'pengurus' => DB::table('pengurus')->count(),
            'karyawan' => DB::table('karyawan')->count(),
            'foto_diri' => DB::table('documents')->where('type', 'foto-diri')->count(),
            'kartu_keluarga' => DB::table('documents')->where('type', 'kartu-keluarga')->count(),
            'akte' => DB::table('documents')->where('type', 'akte')->count(),
            'ijazah' => DB::table('documents')->where('type', 'ijazah')->count(),
            'user' => DB::table('users')->count(),
            'lembaga' => DB::table('lembaga')->count(),
            'kelas' => DB::table('kelas')->count(),
            'wilayah' => DB::table('wilayah')->count(),
            'kamar' => DB::table('kamar')->count(),
            'jabatan' => DB::table('jabatan')->count(),
        ];

        return view('dashboard', $data);
    }
}
