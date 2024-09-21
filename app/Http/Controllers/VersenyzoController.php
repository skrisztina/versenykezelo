<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Versenyzo;

class VersenyzoController extends Controller
{
    public function getVersenyzok(){
        $versenyzok = Versenyzo::orderBy("nev","asc")->get();
        return view("partials.versenyzoTable",compact("versenyzok"));
    }

    public function addVersenyzo(Request $request){
        $request->validate([
            'versenyzoNev' => 'required',
            'versenyzoEmail'=> 'required|email|unique:versenyzo,email',
            'versenyzoSzul'=> 'required|date',
            'versenyzoKezd'=> 'required|date',
            'versenyzoRang'=> 'required',
        ]);

        $nev = $request->input('versenyzoNev');
        $email = $request->input('versenyzoEmail');
        $szul = $request->input('versenyzoSzul');
        $kezdet = $request->input('versenyzoKezd');
        $rang = $request->input('versenyzoRang');

        $newVersenyzo = Versenyzo::create([
            'nev'=> $nev,
            'email'=> $email,
            'szul_ido'=> $szul,
            'rang'=> $rang,
            'versenyzes_kezdete'=> $kezdet,
        ]);

        if($newVersenyzo){
            return response()->json(['success' => 'Versenyző sikeresen hozzáadva']);
        } else {
            return response()->json(['error'=> 'Hiba az új versenyző hozzáadásakor']);
        }
    }

    public function deleteVersenyzo(Request $request){
        $request->validate([
            'email'=>'required|email'
        ]);

        $email = $request->input('email');

        $deletedNum = Versenyzo::where('email',$email)->delete();

        if($deletedNum > 0){
            return response()->json(['success'=> 'A versenyző sikeresen törölve']);
        } else {
            return response()->json(['error'=> 'A verseny törlése nem sikerült']);
        }
    }
}
