<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index_bejelentkezes(){
        return view("bejelentkezes");
    }

    public function index_regisztracio(){
        return view("regisztracio");
    }

    public function login(Request $request){
         $request->validate([
            "email"=> "required|email",
            "password"=> "required"
         ]);

         $email = $request->input("email");
         $jelszo = $request->input("password");


         $user = DB::table("users")->where("email","=", $email)->first();

         if($user && Hash::check($jelszo, $user->password)){
            return redirect()->route("home")->with("success","Sikeres bejelentkezes");
         } else if($user){
            return redirect()->back()->with("error","Sikertelen bejelentkezés");
         } else {
            return redirect()->back()->with("error","Nincs regisztrálva az email cím");
         }
    }

    public function register(Request $request){
        $request->validate([
            "nev"=>"required",
            "email"=> "required|email|unique:users,email",
            "szul"=>"required|date",
            "password" =>"required|string|min:5|confirmed",
        ]);

        $nev = $request->input("nev");
        $email = $request->input("email");
        $telefonszam = $request->input("phone");
        $szul_ido = $request->input("szul");
        $jelszo = $request->input("password");

        $newUser = User::create([
            "name" =>$nev,
            "email" =>$email,
            "telefonszam" => $telefonszam,
            "szul_ido" => $szul_ido,
            "password"=> Hash::make($jelszo),
        ]);

        if($newUser){
            return redirect()->route("bejelentkezes")->with("success","Sikeres Regisztráció");
        } else {
            return redirect()->back()->with("error","A regisztráció nem volt sikeres");
        }
    }
}
