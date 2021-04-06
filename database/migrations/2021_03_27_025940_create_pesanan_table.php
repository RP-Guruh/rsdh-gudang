<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pesanan');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('kategori');
            $table->integer('harga_satuan');
            $table->integer('jumlah_beli');
            $table->string('satuan_hitung');
            $table->integer('total_harga');
            $table->dateTime('tanggal_pesan');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->string('status');
            $table->string('petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
