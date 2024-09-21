<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VersenyzoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("versenyzo")->insert([
            "nev"=>"Toth Panka",
            "email" =>"toth.panka@gmail.com",
            "szul_ido"=>"2001-04-01",
            "rang"=> "2",
            "versenyzes_kezdete"=> "2020-01-01",
        ]);

        DB::table("versenyzo")->insert([
            "nev"=>"Kovacs Pista",
            "email" =>"kovacs.pista@freemail.hu",
            "szul_ido"=>"1990-06-03",
            "rang"=> "5",
            "versenyzes_kezdete"=> "2015-06-01",
        ]);

        DB::table("versenyzo")->insert([
            "nev"=>"Nagy Bálint",
            "email" =>"nagy.balint@hotmail.com",
            "szul_ido"=>"2003-02-14",
            "rang"=> "3",
            "versenyzes_kezdete"=> "2019-08-20",
        ]);

        DB::table("versenyzo")->insert([
            "nev"=>"Kis Aranka",
            "email" =>"kis.aranka@gmail.com",
            "szul_ido"=>"1998-12-23",
            "rang"=> "4",
            "versenyzes_kezdete"=> "2019-05-16",
        ]);

        DB::table("versenyzo")->insert([
            "nev"=>"Király Alex",
            "email" =>"kiraly.alex@freemail.hu",
            "szul_ido"=>"2000-08-22",
            "rang"=> "1",
            "versenyzes_kezdete"=> "2021-10-15",
        ]);
    }
}
