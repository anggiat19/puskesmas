<?php

namespace App\Models;

use App\Models\Spesialis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_d',
        'nama_d',
        'jenis_kel_d',
        'alamat_d',
        'spesialis_id',
        'image'

    ];


    public function spesialis()
    {
        return $this->belongsTo(Spesialis::class, 'spesialis_id', 'id');
        // return $this->hasOne(Role::class,'role_id','id');
        // return $this->hasMany(Role::class, 'role_id', 'id');
    }
}