<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verseny;
use App\Models\Fordulo;
use App\Models\Versenyzo;
use App\Models\Versenyez;

class ForduloController extends Controller
{
    public function loadForduloForm(){
        $versenyek = Verseny::orderBy("ev","desc")->get();
        return view("partials.forduloForm",compact("versenyek"));
    }

    public function loadVersenyzoToFordulo(){
        $fordulok = Fordulo::orderBy("datum","desc")->get();
        $versenyzok = Versenyzo::orderBy("nev","asc")->get();

        return view("partials.versenyzoToForduloForm",compact("fordulok","versenyzok"));
    }

    public function loadForduloTable(){
        $versenyNum = Verseny::count();
        $fordulok = Fordulo::orderBy("datum","desc")->get();
        $versenyzok = Versenyzo::orderBy("nev","asc")->get();
        $versenyezek = Versenyez::orderBy("fordulo_datum","desc")->get();
        return view("partials.forduloTable",compact("fordulok", "versenyzok", "versenyezek", "versenyNum"));
    }

    public function addFordulo(Request $request){
        $request->validate([
            'forduloDatum'=> 'date',
            'forduloNehezseg'=> 'required',
        ]);

        $verseny_azon = explode('_', $request->input('forduloAzon'));
        $verseny_nev = $verseny_azon[0];
        $verseny_ev = $verseny_azon[1];
        $datum = $request->input('forduloDatum');
        $nehezseg = $request->input('forduloNehezseg');

        $newFordulo = Fordulo::create([
            'nehezseg'=> $nehezseg,
            'datum'=> $datum,
            'verseny_nev'=> $verseny_nev,
            'verseny_ev'=> $verseny_ev,

        ]);

        if($newFordulo){
            return response()->json(['success' => 'Forduló sikeresen hozzáadva']);
        } else {
            return response()->json(['error'=> 'Hiba az új Forduló hozzáadásakor']);
        }
    }

    public function addVersenyzoToFordulo(Request $request){
        $fordulo_azon = explode('_', $request->input('forduloSelect'));

        $verseny_nev = $fordulo_azon[0];
        $verseny_ev = $fordulo_azon[1];
        $fordulo_datum = $fordulo_azon[2];
        $versenyzo_email = $request->input('versenyzo');

        $newVersenyez = Versenyez::create([
            'verseny_nev'=> $verseny_nev,
            'verseny_ev'=> $verseny_ev,
            'versenyzo_email'=> $versenyzo_email,
            'fordulo_datum'=> $fordulo_datum,
        ]);

        if($newVersenyez){
            return response()->json(['success' => 'Versenyző sikeresen hozzáadva a fordulóhoz.']);
        } else {
            return response()->json(['error'=> 'Hiba az versenyző fordulóhoz hozzáadásakor.']);
        }
    }

    public function deleteFordulo(Request $request){
        $request->validate([
            'verseny_nev'=> 'required',
            'verseny_ev'=> 'required',
            'datum'=> 'required|date',
        ]);

        $verseny_nev = $request->input('verseny_nev');
        $verseny_ev = $request->input('verseny_ev');
        $datum = $request->input('datum');

        $deletedNum = Fordulo::where('verseny_nev',$verseny_nev)->where('verseny_ev', $verseny_ev)->where('datum', $datum)->delete(); 

        if($deletedNum > 0){
            return response()->json(['success'=> 'A forduló sikeresen törölve']);
        } else {
            return response()->json(['error'=> 'A forduló törlése nem sikerült']);
        }
    }

    public function deleteVersenyez(Request $request){
        $request->validate([
            'verseny_nev'=> 'required',
            'verseny_ev'=> 'required',
            'fordulo_datum'=> 'required|date',
            'versenyzo_email'=>'required|email',
        ]);

        $verseny_nev = $request->input('verseny_nev');
        $verseny_ev = $request->input('verseny_ev');
        $fordulo_datum = $request->input('fordulo_datum');
        $versenyzo_email = $request->input('versenyzo_email');

        $deletedNum = Versenyez::where('verseny_nev',$verseny_nev)->where('verseny_ev', $verseny_ev)->where('fordulo_datum', $fordulo_datum)->where('versenyzo_email', $versenyzo_email)->delete();

        if($deletedNum > 0){
            return response()->json(['success'=> 'A versenyző sikeresen leiratva.']);
        } else {
            return response()->json(['error'=> 'A versenyző leiratása nem sikerült.']);
        }
    }
}
