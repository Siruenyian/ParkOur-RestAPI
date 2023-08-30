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
            $table->id();
            $table->integer('avail_mobil');
            $table->integer('avail_motor');
            $table->integer('max_mobil');
            $table->integer('max_motor');
            $table->integer('price_mobil');
            $table->integer('price_motor');
            $table->unsignedbigInteger('tempat_id');
            $table->foreign('tempat_id')->references('id')->on('tempat')->onUpdate('cascade');;
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
