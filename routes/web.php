<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReqpasienController;
use App\Http\Controllers\SpesialisController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\DetailPenyakitController;
use App\Models\Karyawan;
use App\Models\Spesialis;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.master');
// });
// Route::get('/', function () {
//     return view('home');
// });


Route::get('/', [EmailController::class,'home']);

    Route::get('login', [AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'authenticationg']);
    Route::get('register', [AuthController::class,'register']);
    Route::post('register', [AuthController::class,'registerprocess1']);



Route::middleware('auth')->group(function(){
    Route::get('logout',[AuthController::class,'logout']);
    Route::get('dashboard',[DashboardController::class, 'index'])->middleware('only_admin');
    Route::get('client',[ClientController::class, 'client'])->middleware('only_client');


    Route::get('user/index', [AuthController::class,'index']);
    Route::post('user/index',[AuthController::class,'registerprocess']);
    Route::get('user/delete/{id}',[AuthController::class,'delete']);
    Route::delete('user/destroy/{id}',[AuthController::class,'destroy']);
    Route::get('user/edit/{id}',[AuthController::class,'edit']);
    Route::put('user/edit/{id}',[AuthController::class,'update']);




    Route::get('pasien/index', [PasienController::class,'index']);
    Route::post('pasien/index',[PasienController::class,'store']);
    Route::get('pasien/delete/{id}',[PasienController::class,'delete']);
    Route::delete('pasien/destroy/{id}',[PasienController::class,'destroy']);
    Route::get('pasien/edit/{id}',[PasienController::class,'edit']);
    Route::put('pasien/edit/{id}',[PasienController::class,'update']);



    Route::get('dokter/index', [DokterController::class,'index'])->middleware('only_admin');
    Route::post('dokter/index',[DokterController::class,'store'])->middleware('only_admin');
    Route::get('dokter/delete/{id}',[DokterController::class,'delete'])->middleware('only_admin');
    Route::delete('dokter/destroy/{id}',[DokterController::class,'destroy'])->middleware('only_admin');
    Route::get('dokter/edit/{id}',[DokterController::class,'edit'])->middleware('only_admin');
    Route::put('dokter/edit/{id}',[DokterController::class,'update'])->middleware('only_admin');



    Route::get('penyakit/index', [PenyakitController::class,'index'])->middleware('only_admin');
    Route::post('penyakit/index',[PenyakitController::class,'store'])->middleware('only_admin');
    Route::get('penyakit/delete/{id}',[PenyakitController::class,'delete'])->middleware('only_admin');
    Route::delete('penyakit/destroy/{id}',[PenyakitController::class,'destroy'])->middleware('only_admin');
    Route::get('penyakit/edit/{id}',[PenyakitController::class,'edit']);
    Route::put('penyakit/edit/{id}',[PenyakitController::class,'update']);

    Route::post('/',[EmailController::class,'store'])->middleware('only_admin');
    Route::get('email/index', [EmailController::class,'index'])->middleware('only_admin');
    Route::get('email/delete/{id}',[EmailController::class,'delete'])->middleware('only_admin');
    Route::delete('email/destroy/{id}',[EmailController::class,'destroy'])->middleware('only_admin');

    Route::get('spesialis/index', [SpesialisController::class,'index'])->middleware('only_admin');
    Route::post('spesialis/index',[SpesialisController::class,'store'])->middleware('only_admin');
    Route::get('spesialis/delete/{id}',[SpesialisController::class,'delete'])->middleware('only_admin');
    Route::delete('spesialis/destroy/{id}',[SpesialisController::class,'destroy'])->middleware('only_admin');
    Route::get('spesialis/edit/{id}',[SpesialisController::class,'edit'])->middleware('only_admin');
    Route::put('spesialis/edit/{id}',[SpesialisController::class,'update'])->middleware('only_admin');


    Route::get('pemeriksaan/index', [PemeriksaanController::class,'index'])->middleware('only_admin');
    Route::post('pemeriksaan/index',[PemeriksaanController::class,'store'])->middleware('only_admin');
    Route::get('pemeriksaan/delete/{id}',[PemeriksaanController::class,'delete'])->middleware('only_admin');
    Route::delete('pemeriksaan/destroy/{id}',[PemeriksaanController::class,'destroy'])->middleware('only_admin');
     Route::get('pemeriksaan/edit/{id}',[PemeriksaanController::class,'edit'])->middleware('only_admin');
    Route::put('pemeriksaan/edit/{id}',[PemeriksaanController::class,'update'])->middleware('only_admin');



    Route::get('detailpenyakit/index', [DetailPenyakitController::class,'index'])->middleware('only_admin');
    Route::post('detailpenyakit/index',[DetailPenyakitController::class,'store'])->middleware('only_admin');
    Route::get('detailpenyakit/delete/{id}',[DetailPenyakitController::class,'delete'])->middleware('only_admin');
    Route::delete('detailpenyakit/destroy/{id}',[DetailPenyakitController::class,'destroy'])->middleware('only_admin');
     Route::get('detailpenyakit/edit/{id}',[DetailPenyakitController::class,'edit'])->middleware('only_admin');
    Route::put('detailpenyakit/edit/{id}',[DetailPenyakitController::class,'update'])->middleware('only_admin');



    Route::get('karyawan/index', [KaryawanController::class,'index'])->middleware('only_admin');
    Route::post('karyawan/index',[KaryawanController::class,'store'])->middleware('only_admin');
    Route::get('karyawan/delete/{id}',[KaryawanController::class,'delete'])->middleware('only_admin');
    Route::delete('karyawan/destroy/{id}',[KaryawanController::class,'destroy'])->middleware('only_admin');
    Route::get('karyawan/edit/{id}',[KaryawanController::class,'edit']);
    Route::put('karyawan/edit/{id}',[KaryawanController::class,'update']);







    Route::get('obat/index', [ObatController::class,'index'])->middleware('only_admin');
    Route::post('obat/index',[ObatController::class,'store'])->middleware('only_admin');
    Route::get('obat/delete/{id}',[ObatController::class,'delete'])->middleware('only_admin');
    Route::delete('obat/destroy/{id}',[ObatController::class,'destroy'])->middleware('only_admin');
    Route::get('obat/edit/{id}',[ObatController::class,'edit'])->middleware('only_admin');
    Route::put('obat/edit/{id}',[ObatController::class,'update'])->middleware('only_admin');










































});
