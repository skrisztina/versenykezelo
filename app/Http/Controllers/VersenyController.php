<?php

namespace App\Http\Controllers;

use App\Models\Verseny;
use Illuminate\Http\Request;

class VersenyController extends Controller
{

    public function getVersenyek(){
        $versenyek = Verseny::orderBy("ev","desc")->get();
        return view("partials.versenyTable",compact("versenyek"));
    }
    public function addVerseny(Request $request){
        $request->validate([
            'versenyNev'=>'required|unique:verseny,nev',
            'versenyEv' =>'required|unique:verseny,ev',
            'versenyHely'=> 'required',
            'versenyNyelv'=> 'required',
        ]);

        $nev = $request->input('versenyNev');
        $ev = $request->input('versenyEv');
        $hely = $request->input('versenyHely');
        $nyelv = $request->input('versenyNyelv');

        $newVerseny = Verseny::create([
            'nev'=> $nev,
            'ev'=> $ev,
            'helyszin'=> $hely,
            'nyelvek'=>$nyelv,
        ]);

        if($newVerseny){
            return response()->json(['success' => 'Verseny sikeresen hozzáadva']);
        } else {
            return response()->json(['error'=> 'Hiba az új verseny hozzáadásakor']);
        }
    }

    public function deleteVerseny(Request $request){
        $request->validate([
            'nev'=> 'required|string',
            'ev'=> 'required|integer',
        ]);
        $nev = $request->input('nev');
        $ev = $request->input('ev');

        $deletedNum = Verseny::where('nev',$nev)->where('ev', $ev)->delete();

        if($deletedNum > 0){
            return response()->json(['success'=> 'A verseny sikeresen törölve']);
        } else {
            return response()->json(['error'=> 'A verseny törlése nem sikerült']);
        }
    }
}
