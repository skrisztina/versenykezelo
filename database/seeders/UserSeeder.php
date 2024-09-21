<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "name"=> "Proba",
            "email"=> "proba@gmail.com",
            "password"=> Hash::make("proba123"),
            "telefonszam"=> '06123456',
            "szul_ido"=>"1998-01-01"
        ]);

        DB::table("users")->insert([
            "name"=> "Proba2",
            "email"=> "proba2@gmail.com",
            "password"=> Hash::make("proba2"),
            "telefonszam"=> "06256789",
            "szul_ido"=> "2000-02-01"
        ]);
    }
}
