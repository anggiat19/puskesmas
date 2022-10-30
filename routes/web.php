<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReqpasienController;

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





    Route::get('dokter/index', [DokterController::class,'index']);







    Route::get('diagnosa/index', [DiagnosaController::class,'index']);






    Route::get('reqpasien/index', [ReqpasienController::class,'index']);






    Route::get('pasien/index', [PasienController::class,'index']);







    Route::get('obat/index', [ObatController::class,'index']);







    Route::get('poli/index', [PoliController::class,'index']);







    Route::get('resep/index', [ResepController::class,'index']);







    Route::get('antrian/index', [AntrianController::class,'index']);



















});