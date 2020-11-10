<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Servis
 * @package App\Models
 * @mixin Eloquent
 */

class Servis extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'servis';

    protected $fillable = [
        'name','harga','jenis','keterangan','category','bengkel_id'
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
