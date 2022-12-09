<?php

namespace App\Models;

use App\Models\Obat;
use App\Models\Role;
use App\Models\Penyakit;
use App\Models\Pemeriksaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPenyakit extends Model
{
    use HasFactory;

    protected $table = 'detailpenyakits';


    protected $fillable = [
        'no_urut','kondisi_pasien','pemeriksaan_id','penyakit_id','obat_id'
    ];




    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id', 'id');
        // return $this->hasOne(Role::class,'role_id','id');
        // return $this->hasMany(Role::class, 'role_id', 'id');
    }

    public function pemeriksa()
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id', 'id');
        // return $this->hasOne(Role::class,'role_id','id');
        // return $this->hasMany(Role::class, 'role_id', 'id');
    }



    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id', 'id');
        // return $this->hasOne(Role::class,'role_id','id');
        // return $this->hasMany(Role::class, 'role_id', 'id');
    }


}
