<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRsdhController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengirimanController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

// Route Admin RSDH
//Route Halaman utama
Route::get('/admin/rsdh/dashboard', [AdminRsdhController::class, 'index'])->name('admin/rsdh/dashboard');
Route::get('/admin/rsdh/tambah/barang', [AdminRsdhController::class, 'tambahBarang'])->name('admin/rsdh/tambah/barang');
Route::post('/admin/rsdh/tambah/barang/add', [AdminRsdhController::class, 'add'])->name('admin/rsdh/tambah/barang/add');
Route::get('/admin/rsdh/hapus/barang/{kode}', [AdminRsdhController::class, 'delete'])->name('admin/rsdh/hapus/barang/{kode}');
Route::get('/admin/rsdh/edit/barang/{kode}', [AdminRsdhController::class, 'edit'])->name('admin/rsdh/edit/barang/{kode}');
Route::post('/admin/rsdh/update/barang/{kode}', [AdminRsdhController::class, 'update'])->name('admin/rsdh/update/barang/{kode}');
Route::get('/admin/rsdh/detail/barang/{kode}', [AdminRsdhController::class, 'detail'])->name('admin/rsdh/detail/barang/{kode}');
Route::get('/admin/rsdh/penawaran', [AdminRsdhController::class, 'penawaran'])->name('admin/rsdh/penawaran');


// Route Pesanan Barang
Route::get('/admin/rsdh/dashboard/pesanan/barang', [PesananController::class, 'index'])->name('admin/rsdh/dashboard/pesanan/barang');
Route::get('/admin/rsdh/form/pesanan/barang', [PesananController::class, 'getDataBarang'])->name('admin/rsdh/form/pesanan/barang');
Route::post('/admin/rsdh/pesanan/barang/add', [PesananController::class, 'pesanBarang'])->name('admin/rsdh/pesanan/barang/add');
Route::get('/admin/rsdh/detail/pesanan/{kode}', [PesananController::class, 'detail'])->name('admin/rsdh/detail/pesanan/{kode}');
Route::get('/admin/rsdh/edit/pesanan/{kode}', [PesananController::class, 'edit'])->name('admin/rsdh/edit/pesanan/{kode}');
Route::post('/admin/rsdh/pesanan/barang/update/{kode}', [PesananController::class, 'update'])->name('admin/rsdh/pesanan/barang/{kode}');
Route::get('/admin/rsdh/hapus/pesanan/{kode}', [PesananController::class, 'delete'])->name('admin/rsdh/hapus/pesanan/{kode}');

//Route Penawaran Barang
Route::get('/supplier/dashboard', [PenawaranController::class, 'index'])->name('supplier/dashboard');
Route::get('/supplier/tambah/penawaran', [PenawaranController::class, 'penawaranBarang'])->name('supplier/tambah/penawaran');
Route::post('/supplier/cek/penawaran', [PenawaranController::class, 'cekPenawaran'])->name('/supplier/cek/penawaran');
Route::get('/supplier/add/penawaran', [PenawaranController::class, 'addPenawaran'])->name('supplier/add/penawaran');
Route::get('/supplier/detail/penawaran/{kode}', [PenawaranController::class, 'detail'])->name('/supplier/detail/penawaran/{kode}');
Route::get('/supplier/hapus/penawaran/{kode}', [PenawaranController::class, 'hapus'])->name('/supplier/hapus/penawaran/{kode}');

// Route Pengiriman Barang
Route::get('/supplier/pengiriman/dashboard', [PengirimanController::class, 'index'])->name('supplier/pengiriman/dashboard');
Route::get('/admin/rsdh/pengiriman', [PengirimanController::class, 'dashboardPengiriman'])->name('admin/rsdh/pengiriman');
Route::get('/admin/rsdh/pengiriman/tiba', [PengirimanController::class, 'pengirimanTiba'])->name('admin/rsdh/pengiriman/tiba');

Route::get('/admin/rsdh/konfirmasi/barang/{kode}', [PesananController::class, 'pesananTiba'])->name('admin/rsdh/konfirmasi/barang/{kode}');
Route::post('/admin/konfirmasi/pengiriman', [PesananController::class, 'konfirmasiPesanan'])->name('admin/konfirmasi/pengiriman');



Route::get('/supplier/tambah/pengiriman', [PengirimanController::class, 'getDataBarang'])->name('supplier/tambah/pengiriman');
Route::post('/supplier/add/pengiriman', [PengirimanController::class, 'addPengiriman'])->name('supplier/add/pengiriman');

Route::get('/admin/konfirmasi/penawaran/{kode}', [PenawaranController::class, 'konfirmasi'])->name('admin/konfirmasi/penawaran/{kode}');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index']);
