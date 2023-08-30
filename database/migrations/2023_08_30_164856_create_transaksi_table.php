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

        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('plat_nomor');
            $table->dateTime('tgl_masuk');
            $table->dateTime('tgl_keluar')->nullable();
            $table->string('jenis_kendaraan');
            $table->integer('biaya')->nullable();
            $table->unsignedbigInteger('tempat_id');
            $table->foreign('tempat_id')->references('id')->on('tempat')->onUpdate('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
