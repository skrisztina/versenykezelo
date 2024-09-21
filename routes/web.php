<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VersenyController;
use App\Http\Controllers\VersenyzoController;
use App\Http\Controllers\ForduloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/versenykezelo', [UserController::class, 'index_bejelentkezes'])->name('bejelentkezes');

Route::get('/versenykezelo/regisztracio', [UserController::class, 'index_regisztracio'])->name('regisztracio');

Route::get('/versenykezelo/home', function(){
    return view('home');
})->name('home');

Route::post('/versenykezelo', [UserController::class,'login'])->name('login');
Route::post('/versenykezelo/regisztracio', [UserController::class,'register'])->name('register');

Route::post('/addVerseny', [VersenyController::class,'addVerseny'])->name('addVerseny');
Route::get('/getVersenyek', [VersenyController::class,'getVersenyek'])->name('getVersenyek');
Route::delete('/deleteVerseny', [VersenyController::class,'deleteVerseny'])->name('deleteVerseny');

Route::get('/getVersenyzok', [VersenyzoController::class,'getVersenyzok'])->name('getVersenyzok');
Route::post('/addVersenyzo', [VersenyzoController::class,'addVersenyzo'])->name('addVersenyzo');
Route::delete('/deleteVersenyzo', [VersenyzoController::class,'deleteVersenyzo'])->name('deleteVersenyzo');

Route::get('/getForduloForm', [ForduloController::class, 'loadForduloForm'])->name('getForduloForm');
Route::get('/getVersenyezForm', [ForduloController::class, 'loadVersenyzoToFordulo'])->name('getVersenyezForm');
Route::post('/addFordulo', [ForduloController::class,'addFordulo'])->name('addFordulo');
Route::get('/loadForduloTable', [ForduloController::class, 'loadForduloTable'])->name('loadForduloTable');
Route::get('/addVersenyzoToFordulo', [ForduloController::class,'addVersenyzoToFordulo'])->name('addVersenyzoToFordulo');

Route::delete('/deleteFordulo', [ForduloController::class,'deleteFordulo'])->name('deleteFordulo');
Route::delete('/deleteVersenyez', [ForduloController::class,'deleteVersenyez'])->name('deleteVersenyez');