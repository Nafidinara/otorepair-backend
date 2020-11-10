<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderDetailSparepart
 * @package App\Models
 * @mixin Eloquent
 */

class OrderDetailSparepart extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'order_detail_spareparts';
    protected $fillable = [
        'order_sparepart_id','sparepart_id','harga','qty','berat','berat_total','harga_total'
    ];
}
