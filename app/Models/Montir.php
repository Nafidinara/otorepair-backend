<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Montir
 * @package App\Models
 * @mixin Eloquent
 */

class Montir extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'montirs';
    protected $fillable = [
        'name','biografi','foto','pencapaian','no_hp','bengkel_id'
    ];

    protected $casts = [
        'pencapaian' => 'array'
    ];
}
