<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PenawaranModel extends Model
{
    use HasFactory;
    public function index()
    {
        return DB::table('penawaran')
            ->orderBy('kode_penawaran', 'asc')
            ->paginate(10);
    }

    public function tampil()
    {
        return DB::table('barang')
            ->orderBy('nama_barang', 'asc')
            ->get();
    }

    public function penawaranBarang()
    {
        return DB::table('penawaran')
            ->orderBy('kode_penawaran', 'asc')
            ->paginate(10);
    }

    public function addPenawaran($data)
    {
        DB::table('penawaran')->insert($data);
    }

    public function edit($kode_penawaran)
    {
        return DB::table('penawaran')
            ->where('kode_penawaran', $kode_penawaran)->first();
    }
    public function deletePenawaran($kode_penawaran)
    {
        DB::table('penawaran')
            ->where('kode_penawaran', $kode_penawaran)
            ->delete();
    }

    public function konfirmasiPenawaran($data, $kode)
    {
        DB::table('penawaran')->where('kode_penawaran', $kode)->update($data);
    }
}
