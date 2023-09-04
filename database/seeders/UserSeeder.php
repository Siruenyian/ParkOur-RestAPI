<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        DB::table('user')->insert([
            "id_user"=>"3c8f3b64-acb3-407a-891c-7ba474482297",
            "email" => "1@gmail.com",
            "password" => Hash::make('1'),
            "group" => 'admin',
            "id_tempat" => "1530eb83-5619-451a-b2f7-ffec38183a69"
        ]);
        DB::table('user')->insert([
            "id_user"=>"5ce78998-d9f6-41af-8c03-b87e05717bc7",
            "email" => "2@gmail.com",
            "password" => Hash::make('2'),
            "group" => 'user',
            "id_tempat" => "1530eb83-5619-451a-b2f7-ffec38183a69"
        ]);
    }
}
