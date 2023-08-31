<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
class TempatSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
/*
        $table->uuid('id_tempat')->primary();
        $table->lineString('nama');
        $table->multiLineString('alamat');
        $table->double('latitude');
        $table->double('longitude');
        $table->integer('price_mobil');
        $table->integer('price_motor');*/
        DB::table('tempat')->insert([
            "id_tempat" => "1530eb83-5619-451a-b2f7-ffec38183a69",
            "nama" => "Departemen Teknik Informatika ITS",
            "alamat" => "PQCX+424, Keputih, Sukolilo, Surabaya, East Java 60117",
            "latitude" => 7.2797,
            "longitude" => 112.7976,
            "price_mobil" => 5000,
            "price_motor" => 3000,
        ]);
        DB::table('tempat')->insert([
            "id_tempat" => "d7c5d751-ef8e-466c-ad0e-b7c29042de96",
            "nama" => "Departemen Sistem Informasi ITS",
            "alamat" => "Kampus ITS, Keputih, Kec. Sukolilo, Surabaya, Jawa Timur 60117",
            "latitude" => 7.2808,
            "longitude" => 112.7962,
            "price_mobil" => 5000,
            "price_motor" => 3000,
        ]);
    }
}
