<?php

namespace App\Models;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spesialis extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_spesialis','nama_spesialis'
    ];





}