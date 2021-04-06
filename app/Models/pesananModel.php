<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class pesananModel extends Model
{
    use HasFactory;
    public function index()
    {
        return DB::table('pesanan')
            ->orderBy('nama_barang', 'asc')
            ->paginate(10);
    }
    public function tampil()
    {
        return DB::table('barang')
            ->get();
    }
    public function addPesanBarang($data)
    {
        DB::table('pesanan')->insert($data);
    }

    public function konfirmasiPesanan($data)
    {
        DB::table('pesanan_tiba')->insert($data);
    }


    public function edit($no_pesanan)
    {
        return DB::table('pesanan')
            ->where('no_pesanan', $no_pesanan)->first();
    }
    public function updatePesanBarang($no_pesanan, $data)
    {
        DB::table('pesanan')->where('no_pesanan', $no_pesanan)->update($data);
    }
    public function deletePesanan($no_pesanan)
    {
        DB::table('pesanan')
            ->where('no_pesanan', $no_pesanan)
            ->delete();
    }

    public function tampilpengirimanBarang($kode_pengiriman)
    {
        return DB::table('pengiriman')
            ->where('kode_pengiriman', $kode_pengiriman)
            ->first();
    }
}
