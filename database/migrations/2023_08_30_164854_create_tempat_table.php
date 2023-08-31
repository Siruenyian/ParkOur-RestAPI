<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('tempat', function (Blueprint $table) {
            $table->uuid('id_tempat')->primary();
            $table->string('nama');
            $table->text('alamat');
            $table->double('latitude');
            $table->double('longitude');
            $table->integer('price_mobil');
            $table->integer('price_motor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat');
    }
};
