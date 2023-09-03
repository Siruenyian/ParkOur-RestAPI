<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class UserSeeder extends \Illuminate\Database\Seeder
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
        DB::table('users')->insert([
            "id_user"=>"3c8f3b64-acb3-407a-891c-7ba474482297",
            "username" => "user",
            "password" => "user",
            "id_tempat" => "1530eb83-5619-451a-b2f7-ffec38183a69"
        ]);

    }
}
