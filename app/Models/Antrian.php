<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Antrian
 * @package App\Models
 * @mixin Eloquent
 */

class Antrian extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'antrians';

    protected $fillable = [
        'lokasi_servis','catatan','mulai','akhir','estimasi','status','payment_method','total_harga_jasa','total_harga_kebutuhan','total_harga_keseluruhan','address','user_id','montir_id','bengkel_id'
    ];
}
