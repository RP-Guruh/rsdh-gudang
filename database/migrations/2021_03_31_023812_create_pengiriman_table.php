<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_pengiriman');
            $table->string('nama_supplier');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->date('tgl_kirim');
            $table->integer('jumlah_kirim');
            $table->integer('harga_satuan');
            $table->integer('total_harga');
            $table->string('status');
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
        Schema::dropIfExists('pengiriman');
    }
}
