<?php

namespace Database\Seeders;

use App\Models\Sparepart;
use Illuminate\Database\Seeder;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* `otorepair`.`spareparts` */
        $spareparts = array(
            array('id' => '1','category_id' => '4','bengkel_id' => '1','name' => 'Oli Top HP 1','foto' => NULL,'deskripsi' => 'deskripsi test','merk' => 'merk test','berat' => '1','stok' => '100','status' => 'active','created_at' => '2020-11-05 15:16:51','updated_at' => '2020-11-05 15:16:51','deleted_at' => NULL),
            array('id' => '2','category_id' => '4','bengkel_id' => '1','name' => 'Oli Top HP 2','foto' => NULL,'deskripsi' => 'deskripsi test','merk' => 'merk test','berat' => '1','stok' => '100','status' => 'active','created_at' => '2020-11-05 15:17:02','updated_at' => '2020-11-05 15:17:02','deleted_at' => NULL),
            array('id' => '3','category_id' => '4','bengkel_id' => '1','name' => 'Oli Top HP 3','foto' => NULL,'deskripsi' => 'deskripsi test','merk' => 'merk test','berat' => '1','stok' => '100','status' => 'active','created_at' => '2020-11-05 15:17:08','updated_at' => '2020-11-05 15:17:08','deleted_at' => NULL),
            array('id' => '4','category_id' => '5','bengkel_id' => '1','name' => 'Busi Astra 1','foto' => NULL,'deskripsi' => 'deskripsi test','merk' => 'merk test','berat' => '1','stok' => '100','status' => 'active','created_at' => '2020-11-05 15:17:33','updated_at' => '2020-11-05 15:17:33','deleted_at' => NULL),
            array('id' => '5','category_id' => '5','bengkel_id' => '1','name' => 'Busi Astra 2','foto' => NULL,'deskripsi' => 'deskripsi test','merk' => 'merk test','berat' => '1','stok' => '100','status' => 'active','created_at' => '2020-11-05 15:17:38','updated_at' => '2020-11-05 15:17:38','deleted_at' => NULL),
            array('id' => '6','category_id' => '5','bengkel_id' => '1','name' => 'Busi Astra 3','foto' => NULL,'deskripsi' => 'deskripsi test','merk' => 'merk test','berat' => '1','stok' => '100','status' => 'active','created_at' => '2020-11-05 15:17:44','updated_at' => '2020-11-05 15:17:44','deleted_at' => NULL),
            array('id' => '7','category_id' => '6','bengkel_id' => '1','name' => 'Lampu Sorot Putih','foto' => NULL,'deskripsi' => 'deskripsi test','merk' => 'merk test','berat' => '1','stok' => '100','status' => 'active','created_at' => '2020-11-05 15:18:19','updated_at' => '2020-11-05 15:18:19','deleted_at' => NULL),
            array('id' => '8','category_id' => '6','bengkel_id' => '1','name' => 'Spion Bulat','foto' => NULL,'deskripsi' => 'deskripsi test','merk' => 'merk test','berat' => '1','stok' => '100','status' => 'active','created_at' => '2020-11-05 15:18:34','updated_at' => '2020-11-05 15:18:34','deleted_at' => NULL),
            array('id' => '9','category_id' => '6','bengkel_id' => '1','name' => 'Tebeng Motor Mio','foto' => NULL,'deskripsi' => 'deskripsi test','merk' => 'merk test','berat' => '1','stok' => '100','status' => 'active','created_at' => '2020-11-05 15:19:11','updated_at' => '2020-11-05 15:19:11','deleted_at' => NULL)
        );

        Sparepart::insert($spareparts);
    }
}
