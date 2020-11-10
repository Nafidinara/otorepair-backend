<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bengkel
 * @package App\Models
 * @mixin Eloquent
 */

class Bengkel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bengkels';
    protected $casts = [
      'category' => 'array'
    ];
    protected $fillable = [
        'user_id','nama_bengkel','alamat','lokasi','tgl_berdiri_bengkel','telfon','batas_jangkauan_konsumen','lokasi_servis','type','foto','info_tambahan',
        'jam_buka','jam_tutup','category'
    ];

    public function services(){
        return $this->hasMany(Servis::class,'bengkel_id','id');
    }
}
