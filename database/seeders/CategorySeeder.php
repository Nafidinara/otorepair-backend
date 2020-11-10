<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* `otorepair`.`categories` */
        $categories = array(
            array('id' => '1','bengkel_id' => '1','name' => 'Mesin','slug' => 'mesin','type' => 'servis','created_at' => '2020-11-05 14:24:46','updated_at' => '2020-11-05 14:24:46','deleted_at' => NULL),
            array('id' => '2','bengkel_id' => '1','name' => 'Ban','slug' => 'ban','type' => 'servis','created_at' => '2020-11-05 14:24:56','updated_at' => '2020-11-05 14:24:56','deleted_at' => NULL),
            array('id' => '3','bengkel_id' => '1','name' => 'Variasi','slug' => 'variasi','type' => 'servis','created_at' => '2020-11-05 14:25:07','updated_at' => '2020-11-05 14:25:07','deleted_at' => NULL),
            array('id' => '4','bengkel_id' => '1','name' => 'Oli','slug' => 'oli','type' => 'spareparts','created_at' => '2020-11-05 14:58:23','updated_at' => '2020-11-05 14:58:23','deleted_at' => NULL),
            array('id' => '5','bengkel_id' => '1','name' => 'Busi','slug' => 'busi','type' => 'spareparts','created_at' => '2020-11-05 14:58:35','updated_at' => '2020-11-05 14:58:35','deleted_at' => NULL),
            array('id' => '6','bengkel_id' => '1','name' => 'Aksesoris','slug' => 'aksesoris','type' => 'spareparts','created_at' => '2020-11-05 14:58:43','updated_at' => '2020-11-05 14:58:43','deleted_at' => NULL)
        );

        Category::insert($categories);

        Category::create([
           'name' => 'Servis',
           'slug' => Str::slug('Servis'),
           'type' => 'statis'
        ]);
        Category::create([
            'name' => 'Ban',
            'slug' => Str::slug('Ban'),
            'type' => 'statis'
        ]);
        Category::create([
            'name' => 'Variasi',
            'slug' => Str::slug('Variasi'),
            'type' => 'statis'
        ]);
        Category::create([
            'name' => 'Modifikasi',
            'slug' => Str::slug('Modifikasi'),
            'type' => 'statis'
        ]);
        Category::create([
            'name' => 'Berat',
            'slug' => Str::slug('Berat'),
            'type' => 'statis'
        ]);
    }
}
