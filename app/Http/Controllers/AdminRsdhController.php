<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


class AdminRsdhController extends Controller
{
    public function __construct()
    {
        $this->adminModel = new adminModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'barang' => $this->adminModel->index(),
            'no' => 0,
        ];
        Alert::success('Success Title', 'Success Message');
        return view('admin_rsdh.Dashboard', $data);
    }

    public function tambahBarang()
    {
        return view('admin_rsdh.Tambah_data');
    }

    public function delete($kode_barang)
    {
        $this->adminModel->deleteData($kode_barang);
        Alert::success('Success', 'Data Berhasil Di Hapus');
        return redirect()->back();
    }

    public function add(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $id = substr(str_shuffle(str_repeat($x = '0123456789', ceil(5 / strlen($x)))), 1);
        $data = [
            'kode_barang' => 'KB' . $id,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'harga_min' => $request->harga_min,
            'harga_max' => $request->harga_max,
            'satuan_hitung' => $request->satuan_hitung,
            'exp_date' => $request->exp_date,
            'created_at' => date("Y/m/d h:i:s"),
            'updated_at' => date("Y/m/d h:i:s"),
            'petugas' => 'Admin'
        ];
        $this->adminModel->addBarang($data);
        return redirect(route('admin/rsdh/dashboard'));
    }

    public function edit($kode_barang)
    {
        $data = [
            'barang' => $this->adminModel->edit($kode_barang),
        ];
        return view('admin_rsdh.Update_data', $data);
    }

    public function update($kode_barang, Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'kode_barang' => $kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'harga_min' => $request->harga_min,
            'harga_max' => $request->harga_max,
            'satuan_hitung' => $request->satuan_hitung,
            'exp_date' => $request->exp_date,
            'created_at' => date("Y/m/d h:i:s"),
            'updated_at' => date("Y/m/d h:i:s"),
            'petugas' => 'Admin'
        ];
        $this->adminModel->updateData($kode_barang, $data);
        return redirect(route('admin/rsdh/dashboard'));
    }

    public function detail($kode_barang)
    {
        $data = [
            'barang' => $this->adminModel->edit($kode_barang),
        ];
        return view('admin_rsdh.Detail', $data);
    }

    public function penawaran()
    {
        $data = [
            'penawaran' => $this->adminModel->penawaran(),

        ];

        return view('admin_rsdh.Penawaran', $data);
    }
}
