<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class ParkirSeeder extends \Illuminate\Database\Seeder
{
    /*$table->uuid('id_parkir')->primary();
    $table->integer('lantai');
    $table->integer('avail_mobil');
    $table->integer('avail_motor');
    $table->integer('max_mobil');
    $table->integer('max_motor');
    $table->uuid('id_tempat');
    $table->foreign('id_tempat')->references('id_tempat')->on('tempat')->onUpdate('cascade');;*/
    public function run(): void
    {
        DB::table('parkir')->insert([
            "id_parkir"=>"cc4d02a8-6400-4ad0-ab9b-009bdbf33758",
            "lantai" => 1,
            "avail_mobil" => 12,
            "avail_motor" => 7,
            "max_mobil" => 30,
            "max_motor" => 50,
            "id_tempat" => "1530eb83-5619-451a-b2f7-ffec38183a69"
        ]);
        DB::table('parkir')->insert([
            "id_parkir"=>"6697803c-2fde-434f-8a28-0180c332a21d",
            "lantai" => 2,
            "avail_mobil" => 1,
            "avail_motor" => 3,
            "max_mobil" => 30,
            "max_motor" => 5,
            "id_tempat" => "1530eb83-5619-451a-b2f7-ffec38183a69"
        ]);
        DB::table('parkir')->insert([
            "id_parkir"=>"7bc7daf8-f87d-4ccc-a80c-ac68be6beda0",
            "lantai" => 1,
            "avail_mobil" => 2,
            "avail_motor" => 1,
            "max_mobil" => 30,
            "max_motor" => 50,
            "id_tempat" => "c9bf126f-2726-4d39-b186-d0382bfb73e9"
        ]);
        DB::table('parkir')->insert([
            "id_parkir"=>"7c76feaa-653f-4914-a43c-b911a6d3c49d",
            "lantai" => 1,
            "avail_mobil" => 2,
            "avail_motor" => 1,
            "max_mobil" => 10,
            "max_motor" => 20,
            "id_tempat" => "d7c5d751-ef8e-466c-ad0e-b7c29042de96"
        ]);
    }
}
