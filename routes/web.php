<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ResepController;
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


Route::get('/', [HomeController::class,'home']);
    Route::get('login', [AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'authenticationg']);
    Route::get('register', [AuthController::class,'register']);
    Route::post('register', [AuthController::class,'registerprocess']);


Route::middleware('auth')->group(function(){
    Route::get('logout',[AuthController::class,'logout']);
    Route::get('dashboard',[DashboardController::class, 'index'])->middleware('only_admin');

    Route::get('user/index', [AuthController::class,'index']);
    Route::post('user/index',[AuthController::class,'store']);



    Route::get('pasien/index', [PasienController::class,'index']);
    Route::post('pasien/index',[PasienController::class,'store']);


    Route::get('dokter/index', [DokterController::class,'index']);


    Route::get('penyakit/index', [PenyakitController::class,'index']);
    Route::post('penyakit/index',[PenyakitController::class,'store']);



    Route::get('spesialis/index', [SpesialisController::class,'index']);
    Route::post('spesialis/index',[SpesialisController::class,'store']);


    Route::get('pemeriksaan/index', [PemeriksaanController::class,'index']);
    Route::post('pemeriksaan/index',[PemeriksaanController::class,'store']);


    Route::get('detailpenyakit/index', [DetailPenyakitController::class,'index']);



    Route::get('karyawan/index', [KaryawanController::class,'index']);
    Route::post('karyawan/index',[KaryawanController::class,'store']);


    Route::get('email/index', [EmailController::class,'index']);



    Route::get('obat/index', [ObatController::class,'index']);
    Route::post('obat/index',[ObatController::class,'store']);










































});