<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
/*      $table->uuid('id_transaksi')->primary();
        $table->string('plat_nomor');
        $table->dateTime('tgl_masuk');
        $table->dateTime('tgl_keluar')->nullable();
        $table->string('jenis_kendaraan');
        $table->integer('biaya')->nullable();
        $table->uuid('id_tempat');
        $table->foreign('id_tempat')->references('id_tempat')->on('tempat')->onUpdate('cascade');;*/

        DB::table('transaksi')->insert([
            "id_transaksi" => "1457fc59-1ebe-44e9-b922-078406acd524",
            "plat_nomor" => "RQ0ZA",
            "tgl_masuk" => "2023-08-01 17:00:00",
            "tgl_keluar" => "2023-08-01 18:00:00",
            "jenis_kendaraan" => "MOBIL",
            "biaya" => 5000,
            "status_bayar" => true,
            "id_tempat" => "1530eb83-5619-451a-b2f7-ffec38183a69",
        ]);
        DB::table('transaksi')->insert([
            "id_transaksi" => "f24b4a60-6ea2-485c-9166-294df67729ee",
            "plat_nomor" => "UG2001XX",
            "tgl_masuk" => "2023-08-01 17:00:00",
            "jenis_kendaraan" => "MOTOR",
            "id_tempat" => "1530eb83-5619-451a-b2f7-ffec38183a69",
        ]);
    }
}
