<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServisCategory
 * @package App\Models
 * @mixin Eloquent
 */

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name','slug','type','foto','bengkel_id'
    ];

    public function spareparts(){
        return $this->hasMany(Sparepart::class,'category_id','id');
    }

    public function relations($type){
        if ($type === 'spareparts'){
            return $this->hasMany(Sparepart::class,'category_id','id');
        }else{
            return $this->hasMany(Servis::class,'category_id','id');
        }

    }
}
