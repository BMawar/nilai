<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/siswa', \App\Http\Controllers\SiswaController::class);
Route::resource('/guru', \App\Http\Controllers\GuruController::class);
Route::resource('/mapel', \App\Http\Controllers\MapelController::class);
Route::resource('/nilai', \App\Http\Controllers\NilaiController::class);
