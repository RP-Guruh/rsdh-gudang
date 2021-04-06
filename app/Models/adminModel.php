<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class adminModel extends Model
{
    use HasFactory;

    public function index()
    {
        return DB::table('barang')
            ->orderBy('nama_barang', 'asc')
            ->paginate(10);
    }

    public function penawaran()
    {
        return DB::table('penawaran')
            ->orderBy('nama_barang', 'asc')
            ->paginate(10);
    }

    public function addBarang($data)
    {
        DB::table('barang')->insert($data);
    }

    public function deleteData($kode_barang)
    {
        DB::table('barang')
            ->where('kode_barang', $kode_barang)
            ->delete();
    }

    public function edit($kode_barang)
    {
        return DB::table('barang')
            ->where('kode_barang', $kode_barang)->first();
    }

    public function updateData($kode_barang, $data)
    {
        DB::table('barang')->where('kode_barang', $kode_barang)->update($data);
    }
}
