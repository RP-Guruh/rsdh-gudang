<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengirimanModel;
use Illuminate\Support\Facades\DB;

class PengirimanController extends Controller
{
    public function __construct()
    {
        $this->pengirimanModel = new PengirimanModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'pengiriman' => $this->pengirimanModel->index(),
        ];
        return view('supplier.pengiriman', $data);
    }

    public function dashboardPengiriman()
    {
        $data = [
            'pengiriman' => $this->pengirimanModel->index(),
        ];
        return view('admin_rsdh.pengiriman', $data);
    }

    public function pengirimanTiba()
    {
        $data = [
            'pengiriman' => $this->pengirimanModel->pengirimanTiba(),
        ];
        return view('admin_rsdh.pengiriman_selesai', $data);
    }

    public function getDataBarang()
    {
        $data = [
            'pengiriman' => $this->pengirimanModel->tampil(),
        ];
        return view('supplier.tambah_pengiriman', $data);
    }

    public function addPengiriman(Request $request)
    {
        $kode = $request->kode_barang;
        date_default_timezone_set("Asia/Jakarta");
        $id = substr(str_shuffle(str_repeat($x = '0123456789', ceil(5 / strlen($x)))), 1);
        $getData =  DB::table('penawaran')
            ->where('kode_barang', $kode)->first();

        $data = [
            'kode_pengiriman' => 'KRM' . $id,
            'nama_supplier' => $request->nama_supplier,
            'kode_barang' => $kode,
            'nama_barang' => $getData->nama_barang,
            'tgl_kirim' => date("Y/m/d"),
            'jumlah_kirim' => $request->jumlah_kirim,
            'status' => 'Di Kirim',
            'created_at' => date("Y/m/d h:i:s"),
            'updated_at' => date("Y/m/d h:i:s")
        ];
        $this->pengirimanModel->addPengiriman($data);
        return redirect(route('supplier/pengiriman/dashboard'));
    }
}
