<?php

namespace Database\Seeders;

use App\Models\Bengkel;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //owner bengkel user
        $userbengkel = User::create([
            'name' => 'owner bengkel',
            'email' => 'bengkel@bengkel.com',
            'category' => 'bengkel',
            'password' => bcrypt('123456')
        ]);

        $category = [];

        array_push($category,array(
            'name' => 'Variasi',
            'category_id' => "9"
        ));

        array_push($category,array(
            'name' => 'Service',
            'category_id' => "7"
        ));

        Bengkel::create([
            'user_id' => $userbengkel->id,
           'nama_bengkel' => 'bengkel test',
           'alamat' => 'alamat test',
           'lokasi' => 'lokasi test',
           'tgl_berdiri_bengkel' => '2011-08-23',
           'telfon' => '0812345678',
           'batas_jangkauan_konsumen' => '10',
            'lokasi_servis' => 'dibengkel',
            'type' => 'umum',
            'foto' => null,
            'info_tambahan' => 'bengkel ini sangat murah',
            'jam_buka' => '09.00',
            'jam_tutup' => '18.00',
            'category' => $category
        ]);

        //user biasa
        $customer = User::create([
            'name' => 'customer test',
            'email' => 'customer@customer.com',
            'category' => 'customer',
            'password' => bcrypt('123456')
        ]);
        Customer::create([
            'user_id' => $customer->id,
           'tgl_lahir' => '2002-06-24',
           'alamat' => 'alamat test',
           'jenis_kendaraan' => 'motor',
           'biodata' => 'aku adalah ketua geng motor jago'
        ]);
    }
}
