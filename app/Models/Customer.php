<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * @package App\Models
 * @mixin Eloquent
 */

class Customer extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'customers';
    protected $fillable = [
        'user_id','tgl_lahir','alamat','jenis_kendaraan','biodata'
    ];
}
