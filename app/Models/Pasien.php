<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;


    protected $fillable = [
        'kode_p','nama_p','jenis_kel_p','tgl_lahir_p','telp_p','alamat_p','nama_kel_p'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        // return $this->hasOne(Role::class,'role_id','id');
        // return $this->hasMany(Role::class, 'role_id', 'id');
    }
}
