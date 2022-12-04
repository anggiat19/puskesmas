<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_d',
        'nama_d',
        'jenis_kel_d',
        'alamat_d',
        'image',

    ];
}