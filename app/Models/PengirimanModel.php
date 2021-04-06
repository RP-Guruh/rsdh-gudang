<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PengirimanModel extends Model
{
    use HasFactory;

    public function index()
    {
        return DB::table('pengiriman')
            ->orderBy('kode_pengiriman', 'asc')
            ->paginate(10);
    }

    public function pengirimanTiba()
    {
        return DB::table('pesanan_tiba')
            ->orderBy('kode_pengiriman', 'asc')
            ->paginate(10);
    }

    public function tampil()
    {
        return DB::table('penawaran')
            ->orderBy('nama_barang', 'asc')
            ->where('status', 'Di Setujui')
            ->get();
    }

    public function addPengiriman($data)
    {
        DB::table('pengiriman')->insert($data);
    }
}
