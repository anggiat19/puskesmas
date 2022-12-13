<?php

namespace App\Models;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_periksa','tgl_periksa','pasien_id','dokter_id','karyawan_id'
    ];



      /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
        // return $this->hasOne(Role::class,'role_id','id');
        // return $this->hasMany(Role::class, 'role_id', 'id');
    }
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id');
        // return $this->hasOne(Role::class,'role_id','id');
        // return $this->hasMany(Role::class, 'role_id', 'id');
    }
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id');
        // return $this->hasOne(Role::class,'role_id','id');
        // return $this->hasMany(Role::class, 'role_id', 'id');
    }
}