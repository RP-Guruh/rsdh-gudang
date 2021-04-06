<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penawaranModel;
use App\Models\pesananModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use Session;


class PenawaranController extends Controller
{
    public function __construct()
    {
        $this->penawaranModel = new penawaranModel();
        $this->pesananModel = new pesananModel();
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'penawaran' => $this->penawaranModel->index(),
        ];
        return view('supplier.Dashboard', $data);
    }

    public function penawaranBarang()
    {
        $data = [
            'barang' => $this->penawaranModel->tampil(),
        ];
        return view('supplier.Tambah_data', $data);
    }

    public function cekPenawaran(Request $request)
    {
        $kode = $request->nama_barang;
        $harga_tawar = $request->harga_penawaran;
        $pesan = null;
        $info = null;
        $x = 0;
        date_default_timezone_set("Asia/Jakarta");
        $id = substr(str_shuffle(str_repeat($x = '0123456789', ceil(5 / strlen($x)))), 1);
        $getData =  DB::table('barang')
            ->where('kode_barang', $kode)->first();


        Session::put('nama_barang', $getData->nama_barang);
        Session::put('harga_penawaran', $request->harga_penawaran);
        Session::put('nama_supplier',  $request->nama_supplier);
        Session::put('kode_barang',  $getData->kode_barang);


        if ($harga_tawar < $getData->harga_min) {
            $pesan = "Harga Penawaran Terlalu Rendah";
            $info = "Lakukan pengajuan harga kembali";
            $x = 1;
        } else {
            $pesan = "Harga Penawaran Di Terima";
            $info = "Kirim Penawaran Harga";
            $x = 0;
        }

        $getMessage = [
            'pesan' => $pesan,
            'info' => $info,
            'x' => $x
        ];
        return view('supplier.Pesan', $getMessage);
    }

    public function addPenawaran(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $id = substr(str_shuffle(str_repeat($x = '0123456789', ceil(5 / strlen($x)))), 1);

        $data = [
            'kode_penawaran' => 'PNW' . $id,
            'nama_supplier' => Session::get('nama_supplier'),
            'nama_barang' => Session::get('nama_barang'),
            'kode_barang' => Session::get('kode_barang'),
            'harga_penawaran' => Session::get('harga_penawaran'),
            'tgl_penawaran' => date("Y/m/d h:i:s"),
            'hasil' => 'Berhasil',
            'status' => 'Menunggu Persetujuan',
            'created_at' => date("Y/m/d h:i:s"),
            'updated_at' => date("Y/m/d h:i:s"),
        ];

        $this->penawaranModel->addPenawaran($data);
        return redirect(route('supplier/dashboard'));
    }

    public function detail($kode_penawaran)
    {
        $data = [
            'penawaran' => $this->penawaranModel->edit($kode_penawaran),
        ];
        return view('supplier.Detail', $data);
    }
    public function edit($kode_penawaran)
    {
        $data = [
            'penawaran' => $this->penawaranModel->edit($kode_penawaran),
            'barang' => $this->pesananModel->tampil()
        ];
        return view('supplier.Update_data', $data);
    }
    public function hapus($kode_penawaran)
    {
        $this->penawaranModel->deletePenawaran($kode_penawaran);
        return redirect()->back();
    }

    public function konfirmasi(Request $request, $kode)
    {
        date_default_timezone_set("Asia/Jakarta");
        $id = substr(str_shuffle(str_repeat($x = '0123456789', ceil(5 / strlen($x)))), 1);

        $data = [
            'status' => 'Di Setujui'
        ];

        $this->penawaranModel->konfirmasiPenawaran($data, $kode);
        return redirect()->back();
    }
}
