<?php

namespace Database\Seeders;

use App\Models\Servis;
use Illuminate\Database\Seeder;

class ServisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* `otorepair`.`servis` */
        $servis = array(
            array('id' => '1','category_id' => '1','bengkel_id' => '1','name' => 'Jasa Ganti Oli','harga' => '20000','jenis' => 'motor','keterangan' => 'jasa ganti oli','created_at' => '2020-11-05 14:21:58','updated_at' => '2020-11-05 14:21:58','deleted_at' => NULL),
            array('id' => '2','category_id' => '1','bengkel_id' => '1','name' => 'Jasa Ganti Busi','harga' => '18000','jenis' => 'motor','keterangan' => 'jasa ganti busi','created_at' => '2020-11-05 14:27:14','updated_at' => '2020-11-05 14:27:14','deleted_at' => NULL),
            array('id' => '3','category_id' => '1','bengkel_id' => '1','name' => 'Jasa Ganti Aki','harga' => '25000','jenis' => 'motor','keterangan' => 'jasa ganti aki','created_at' => '2020-11-05 14:28:24','updated_at' => '2020-11-05 14:28:24','deleted_at' => NULL),
            array('id' => '4','category_id' => '2','bengkel_id' => '1','name' => 'Jasa Ganti Ban','harga' => '10000','jenis' => 'motor','keterangan' => 'jasa ganti ban','created_at' => '2020-11-05 14:35:40','updated_at' => '2020-11-05 14:35:40','deleted_at' => NULL),
            array('id' => '5','category_id' => '2','bengkel_id' => '1','name' => 'Jasa Ganti Ban Dalam','harga' => '12000','jenis' => 'motor','keterangan' => 'jasa ganti ban dalam','created_at' => '2020-11-05 14:35:58','updated_at' => '2020-11-05 14:35:58','deleted_at' => NULL),
            array('id' => '6','category_id' => '2','bengkel_id' => '1','name' => 'Jasa Tambal Ban','harga' => '7000','jenis' => 'motor','keterangan' => 'jasa tambal ban','created_at' => '2020-11-05 14:36:28','updated_at' => '2020-11-05 14:36:28','deleted_at' => NULL),
            array('id' => '7','category_id' => '3','bengkel_id' => '1','name' => 'Jasa Ganti Velg','harga' => '450000','jenis' => 'mobil','keterangan' => 'jasa ganti velg','created_at' => '2020-11-05 14:37:18','updated_at' => '2020-11-05 14:37:18','deleted_at' => NULL),
            array('id' => '8','category_id' => '3','bengkel_id' => '1','name' => 'Jasa Ganti Cap','harga' => '750000','jenis' => 'mobil','keterangan' => 'jasa ganti cap','created_at' => '2020-11-05 14:37:32','updated_at' => '2020-11-05 14:37:32','deleted_at' => NULL)
        );

        Servis::insert($servis);
    }
}
