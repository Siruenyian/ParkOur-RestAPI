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

        Schema::create('parkir', function (Blueprint $table) {
            $table->uuid('id_parkir')->primary();
            $table->integer('lantai');
            $table->integer('avail_mobil');
            $table->integer('avail_motor');
            $table->integer('max_mobil');
            $table->integer('max_motor');
            $table->uuid('id_tempat');
            $table->foreign('id_tempat')->references('id_tempat')->on('tempat')->onUpdate('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkir');
    }
};
