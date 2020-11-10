<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sparepart
 * @package App\Models
 * @mixin Eloquent
 */

class Sparepart extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'spareparts';
    protected $fillable = [
        'name','foto','deskripsi','merk','berat','stok','status','category_id','bengkel_id'
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

//    public static function boot(){
//        parent::boot();
//        static::deleted(function($sparepart)
//        {
//            $sparepart->categories()->each(function($categories) {
//                $categories->spareparts()->dissociate();
//                $categories->save();
//            });
//        });
//    }

}
