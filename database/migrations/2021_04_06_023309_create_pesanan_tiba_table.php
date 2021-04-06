<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTibaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_tiba', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_pengiriman');
            $table->string('nama_supplier');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->date('tgl_kirim');
            $table->date('tgl_terima');
            $table->integer('jumlah_kirim');
            $table->integer('jumlah_terima');
            $table->integer('jumlah_minus');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan_tiba');
    }
}
