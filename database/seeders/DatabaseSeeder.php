<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('persons')->insert([
            "uuid" => "09318e35-5b27-4614-8363-3193d04147ff",
            "no_kk" => 3528042101150010,
            "nik" => 3528045704010004,
            "nama" => "Programmer",
            "tanggal_lahir" => "2001-04-17",
            "tempat_lahir" => "Pamekasan",
            "jenis_kelamin" => "P",
            "prov_id" => 15,
            "kab_id" => 223,
            "kec_id" => 3567,
            "desa_id" => 43863,
            "jalan" => "Jl. Kowel Jaya Pamekasan",
            "kode_pos" => 69351,
            "created_by" => "21c2bc0b-ac53-41d2-bb44-0888f84bb586",
            "created_at" => new DateTime(),
            "updated_by" => "21c2bc0b-ac53-41d2-bb44-0888f84bb586",
            "updated_at" => new DateTime()
        ]);

        DB::table('users')->insert([
            "person_uuid" => "09318e35-5b27-4614-8363-3193d04147ff",
            "username" => "bundoo",
            "password" => Hash::make('1234'),
            "role" => "sysadmin",
            "created_by" => "21c2bc0b-ac53-41d2-bb44-0888f84bb586",
            "created_at" => new DateTime(),
            "updated_by" => "21c2bc0b-ac53-41d2-bb44-0888f84bb586",
            "updated_at" => new DateTime()
        ]);
    }
}
