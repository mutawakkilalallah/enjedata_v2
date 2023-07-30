<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('login', $data);
    }

    public function auth(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => "username harus diisi",
                'password.required' => "password harus diisi",
            ]
        );

        $credentials = $validator->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('errorLogin', 'Invalid Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function index()
    {
        $users = DB::table('users')
            ->orderByDesc('updated_at')
            ->get();
        $data = [
            'title' => 'Data User',
            'users' => $users
        ];

        return view('user.index', $data);
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
        $data = [
            'title' => 'Formulir',
            'p' => $person
        ];

        return view('person.detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah User',
            'persons' => DB::table('persons')->get()
        ];

        return view('user.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'person_uuid' => 'required',
            'username' => 'required|min:4',
            'role' => 'required',
            'password' => 'required|min:4',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $validated['created_by'] = auth()->user()->person_uuid;
        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['created_at'] = new DateTime();
        $validated['updated_at'] = new DateTime();

        DB::table('users')->insert($validated);

        $request->session()->flash('success', 'User Berhasil ditambahkan');

        return redirect('/user');
    }

    public function edit($id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        $data = [
            'title' => 'Data User',
            'u' => $user,
        ];

        return view('user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'role' => 'required',
        ]);

        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['updated_at'] = new DateTime();

        DB::table('users')->where('id', $id)->update($validated);

        $request->session()->flash('success', 'User Berhasil diubah');

        return redirect('/user');
    }

    public function updatePassword(Request $request, $id)
    {
        $validated = $request->validate([
            'password' => 'required|min:4',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['updated_at'] = new DateTime();

        DB::table('users')->where('id', $id)->update($validated);

        $request->session()->flash('success', 'Password Berhasil diubah');

        return redirect('/user');
    }
}
