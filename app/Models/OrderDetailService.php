<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderDetailService
 * @package App\Models
 * @mixin Eloquent
 */

class OrderDetailService extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'order_detail_service';

    protected $fillable = [
        'antrian_id','nama','harga','keterangan','qty','harga_total','type'
    ];
}
