<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderSparepart
 * @package App\Models
 * @mixin Eloquent
 */

class OrderSparepart extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_spareparts';
    protected $fillable = [
        'user_id','bengkel_id','berat','total_ongkir','harga_sparepart','harga_keseluruhan','payment_method','waybill','shiping_service','address'
    ];
}
