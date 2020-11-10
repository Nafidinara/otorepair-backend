<?php

namespace Database\Seeders;

use App\Models\Montir;
use Illuminate\Database\Seeder;

class MontirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* `otorepair`.`montirs` */
        $montirs = array(
            array('id' => '1','bengkel_id' => '1','name' => 'Anton Cahyadi','biografi' => 'seorang montir yang sudah handal','foto' => NULL,'pencapaian' => '[{"nama":"sertifikat astra","dari":"2020-08-24","sampai":"2020-11-24","id_kredensial":"qwer123","url_kredensial":"https:\\/\\/google.com"},{"nama":"sertifikat astra 2","dari":"2020-08-24","sampai":"2020-11-24","id_kredensial":"qwer1233","url_kredensial":"https:\\/\\/google.com2"}]','no_hp' => '012345678','created_at' => '2020-11-05 15:09:00','updated_at' => '2020-11-05 15:09:00','deleted_at' => NULL),
            array('id' => '2','bengkel_id' => '1','name' => 'Suparno Nasir','biografi' => 'seorang montir yang sudah handal','foto' => NULL,'pencapaian' => '[{"nama":"sertifikat astra","dari":"2020-08-24","sampai":"2020-11-24","id_kredensial":"qwer123","url_kredensial":"https:\\/\\/google.com"},{"nama":"sertifikat astra 2","dari":"2020-08-24","sampai":"2020-11-24","id_kredensial":"qwer1233","url_kredensial":"https:\\/\\/google.com2"}]','no_hp' => '012345678','created_at' => '2020-11-05 15:10:16','updated_at' => '2020-11-05 15:10:16','deleted_at' => NULL),
            array('id' => '3','bengkel_id' => '1','name' => 'Basir Ahmad','biografi' => 'seorang montir yang sudah handal','foto' => NULL,'pencapaian' => '[{"nama":"sertifikat astra","dari":"2020-08-24","sampai":"2020-11-24","id_kredensial":"qwer123","url_kredensial":"https:\\/\\/google.com"},{"nama":"sertifikat astra 2","dari":"2020-08-24","sampai":"2020-11-24","id_kredensial":"qwer1233","url_kredensial":"https:\\/\\/google.com2"}]','no_hp' => '012345678','created_at' => '2020-11-05 15:10:36','updated_at' => '2020-11-05 15:10:36','deleted_at' => NULL),
            array('id' => '4','bengkel_id' => '1','name' => 'Rosyid Nur Hakim','biografi' => 'seorang montir yang sudah handal','foto' => NULL,'pencapaian' => '[{"nama":"sertifikat astra","dari":"2020-08-24","sampai":"2020-11-24","id_kredensial":"qwer123","url_kredensial":"https:\\/\\/google.com"},{"nama":"sertifikat astra 2","dari":"2020-08-24","sampai":"2020-11-24","id_kredensial":"qwer1233","url_kredensial":"https:\\/\\/google.com2"}]','no_hp' => '012345678','created_at' => '2020-11-05 15:10:54','updated_at' => '2020-11-05 15:10:54','deleted_at' => NULL)
        );

        Montir::insert($montirs);
    }
}
