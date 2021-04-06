<?php

namespace App\Http\Controllers;

use App\Models\pesananModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PesananController extends Controller
{

    public function __construct()
    {
        $this->pesananModel = new pesananModel();
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'pesanan' => $this->pesananModel->index(),
        ];
        return view('admin_rsdh.pesanan.Dashboard', $data);
    }
    public function getDataBarang()
    {
        $data = [
            'barang' => $this->pesananModel->tampil(),
        ];
        return view('admin_rsdh.pesanan.Tambah_data', $data);
    }

    public function pesanBarang(Request $request)
    {
        $kode = $request->kode_barang;
        date_default_timezone_set("Asia/Jakarta");
        $id = substr(str_shuffle(str_repeat($x = '0123456789', ceil(5 / strlen($x)))), 1);
        $getData =  DB::table('barang')
            ->where('kode_barang', $kode)->first();
        $total = $request->jumlah_beli * $getData->harga_satuan;

        $data = [
            'no_pesanan' => 'PSN' . $id,
            'kode_barang' => $kode,
            'nama_barang' => $getData->nama_barang,
            'kategori' => $getData->kategori,
            'harga_satuan' => $getData->harga_satuan,
            'jumlah_beli' => $request->jumlah_beli,
            'satuan_hitung' => $getData->satuan_hitung,
            'total_harga' => $total,
            'tanggal_pesan' => $request->tanggal_pesan,
            'created_at' => date("Y/m/d h:i:s"),
            'updated_at' => date("Y/m/d h:i:s"),
            'status' => 'Di Pesan',
            'petugas' => 'Hermawan'
        ];
        $this->pesananModel->addPesanBarang($data);
        return redirect(route('admin/rsdh/dashboard/pesanan/barang'));
    }

    public function detail($kode_barang)
    {
        $data = [
            'pesanan' => $this->pesananModel->edit($kode_barang),
        ];
        return view('admin_rsdh.pesanan.Detail', $data);
    }

    public function edit($kode_barang)
    {
        $data = [
            'pesanan' => $this->pesananModel->edit($kode_barang),
            'barang' => $this->pesananModel->tampil()
        ];
        return view('admin_rsdh.pesanan.Update', $data);
    }

    public function update(Request $request, $no_pesanan)
    {
        $kode = $request->kode_barang;

        date_default_timezone_set("Asia/Jakarta");
        $getData =  DB::table('pesanan')
            ->where('no_pesanan', $no_pesanan)->first();
        $total = $request->jumlah_beli * $getData->harga_satuan;

        $data = [
            'no_pesanan' => $no_pesanan,
            'kode_barang' => $kode,
            'nama_barang' => $getData->nama_barang,
            'kategori' => $getData->kategori,
            'harga_satuan' => $getData->harga_satuan,
            'jumlah_beli' => $request->jumlah_beli,
            'satuan_hitung' => $getData->satuan_hitung,
            'total_harga' => $total,
            'tanggal_pesan' => $request->tanggal_pesan,
            'created_at' => date("Y/m/d h:i:s"),
            'status' => 'Di Pesan',
            'petugas' => 'Hermawan'
        ];
        $this->pesananModel->updatePesanBarang($no_pesanan, $data);
        return redirect(route('admin/rsdh/dashboard/pesanan/barang'));
    }

    public function delete($no_pesanan)
    {
        $this->pesananModel->deletePesanan($no_pesanan);

        return redirect()->back();
    }

    public function pesananTiba($kode_pengiriman)
    {
        $data = [
            'pengiriman' => $this->pesananModel->tampilpengirimanBarang($kode_pengiriman),
        ];
        return view('admin_rsdh.pengiriman_sampai', $data);
    }

    public function konfirmasiPesanan(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'kode_pengiriman' => $request->kode,
            'nama_supplier' => $request->supplier,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->barang,
            'tgl_kirim' => $request->tgl_kirim,
            'tgl_terima' => $request->tgl_terima,
            'jumlah_kirim' => $request->jum_kirim,
            'jumlah_terima' => $request->jum_terima,
            'jumlah_minus' => $request->jum_minus,
            'created_at' => date("Y/m/d h:i:s"),
            'updated_at' => date("Y/m/d h:i:s"),
        ];

        $this->pesananModel->konfirmasiPesanan($data);
        return redirect(route('admin/rsdh/pengiriman'));
    }
}
