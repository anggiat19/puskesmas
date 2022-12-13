<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Category;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;


class DashboardController extends Controller
{
    public function index()

    {

    ;
            $pasienCount = Pasien::count();
            $dokterCount = Dokter::count();
            $karyawanCount = Karyawan::count();
           return view('dashboard',[
            'pasien_count' => $pasienCount,
            'dokter_count'=>$dokterCount,
            'karyawan_count'=>$karyawanCount,




        ]);


    }
}
