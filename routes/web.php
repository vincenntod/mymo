<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataMenuController;
use App\Http\Controllers\DataPesananController;
use App\Http\Controllers\DataBarangKeluarController;
use App\Http\Controllers\DataTransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('User.login');
})->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'ceklevel']], function () {
    Route::get('/beranda', [BerandaController::class, 'index']);
    Route::get('/data_barang', [DataBarangController::class, 'index'])->name('data_barang');
    Route::get('/data_menu', [DataMenuController::class, 'index'])->name('data_menu');
    Route::get('/data_pesanan', [DataPesananController::class, 'index'])->name('data_pesanan');
    Route::get('/data_transaksi', [DataTransaksiController::class, 'index'])->name('data_transaksi');
    Route::get('/data_barang_keluar', [DataBarangKeluarController::class, 'index'])->name('data_barang_keluar');
    //barang
    Route::get('/create_barang', [DataBarangController::class, 'create'])->name('create_barang');
    Route::post('/store_barang', [DataBarangController::class, 'store'])->name('store_barang');
    Route::get('/edit_barang/{id}', [DataBarangController::class, 'edit'])->name('edit_barang');
    Route::put('/update_barang/{id}', [DataBarangController::class, 'update'])->name('update_barang');
    Route::delete('/delete_barang/{id}', [DataBarangController::class, 'destroy'])->name('delete_barang');
    Route::get('/cetak_barang', [DataBarangController::class, 'cetak'])->name('cetak_barang');
    //menu
    Route::get('/create_menu', [DataMenuController::class, 'create'])->name('create_menu');
    Route::post('/store_menu', [DataMenuController::class, 'store'])->name('store_menu');
    Route::get('/edit_menu/{id}', [DataMenuController::class, 'edit'])->name('edit_menu');
    Route::put('/update_menu/{id}', [DataMenuController::class, 'update'])->name('update_menu');
    Route::delete('/delete_menu/{id}', [DataMenuController::class, 'destroy'])->name('delete_menu');
    Route::get('/cetak_barang', [DataMenuController::class, 'cetak'])->name('cetak_menu');
    //pesanan
    Route::get('/create_pesanan', [DataPesananController::class, 'create'])->name('create_pesanan');
    Route::post('/store_pesanan', [DataPesananController::class, 'store'])->name('store_pesanan');
    Route::get('/edit_pesanan/{id}', [DataPesananController::class, 'edit'])->name('edit_pesanan');
    Route::put('/update_pesanan/{id}', [DataPesananController::class, 'update'])->name('update_pesanan');
    Route::delete('/delete_pesanan/{id}', [DataPesananController::class, 'destroy'])->name('delete_pesanan');
    Route::get('/cetak_pesanan', [DataPesananController::class, 'cetak'])->name('cetak_pesanan');
    //transaksi
    Route::get('/create_transaksi', [DataTransaksiController::class, 'create'])->name('create_transaksi');
    Route::post('/store_transaksi', [DataTransaksiController::class, 'store'])->name('store_transaksi');
    Route::get('/edit_transaksi/{id}', [DataTransaksiController::class, 'edit'])->name('edit_transaksi');
    Route::put('/update_transaksi/{id}', [DataTransaksiController::class, 'update'])->name('update_transaksi');
    Route::delete('/delete_transaksi/{id}', [DataTransaksiController::class, 'destroy'])->name('delete_transaksi');
    Route::get('/cetak_transaksi', [DataTransaksiController::class, 'cetak'])->name('cetak_transaksi');
    //stock
    Route::get('/create_data_barang_keluar', [DataBarangKeluarController::class, 'create'])->name('create_data_barang_keluar');
    Route::post('/store_data_barang_keluar', [DataBarangKeluarController::class, 'store'])->name('store_data_barang_keluar');
    Route::get('/edit_data_barang_keluar/{id}', [DataBarangKeluarController::class, 'edit'])->name('edit_data_barang_keluar');
    Route::put('/update_data_barang_keluar/{id}', [DataBarangKeluarController::class, 'update'])->name('update_data_barang_keluar');
    Route::delete('/delete_data_barang_keluar/{id}', [DataBarangKeluarController::class, 'destroy'])->name('delete_data_barang_keluar');
    Route::get('/cetak_data_barang_keluar', [DataBarangKeluarController::class, 'cetak'])->name('cetak_data_barang_keluar');
    //get payment
    Route::get('/payment/{id}', [DataTransaksiController::class, 'payment'])->name('payment');
});

// Route::group(['middleware' => ['auth', 'ceklevel:admin,gudang']], function () {
    // Route::get('/beranda', [BerandaController::class, 'index']);
    // Route::get('/data_barang', [DataBarangController::class, 'index'])->name('data_barang');
    // Route::get('/data_menu', [BerandaController::class, 'datamenu'])->name('data_menu');
    // Route::get('/pesanan_pelanggan', [BerandaController::class, 'pesananpelanggan'])->name('pesanan_pelanggan');
// });

// Route::group(['middleware', ['auth', 'ceklevel:gudang']], function () {
//     Route::get('/beranda', [BerandaController::class, 'index']);
//     Route::get('/stock_barang', [BerandaController::class, 'stockbarang'])->name('stock_barang');
// });

// Route::group(['middleware', ['auth', 'ceklevel:admin']], function () {
//     Route::get('/beranda', [BerandaController::class, 'index']);
//     Route::get('/transaksi', [BerandaController::class, 'transaksi'])->name('transaksi');
// });

// Route::group(['middleware', ['auth', 'ceklevel:admin,pemilik']], function () {
//     Route::get('/beranda', [BerandaController::class, 'index']);
//     Route::get('/laporan_menu_terlaris', [BerandaController::class, 'laporan_menu_terlaris'])->name('laporan_menu_terlaris');
//     Route::get('/laporan_pesanan_pelanggan', [BerandaController::class, 'laporan_pesanan_pelanggan'])->name('laporan_pesanan_pelanggan');
//     Route::get('/laporan_stock_barang', [BerandaController::class, 'laporan_stock_barang'])->name('laporan_stock_barang');
//     Route::get('/laporan_transaksi_penjualan', [BerandaController::class, 'laporan_transaksi_penjualan'])->name('laporan_transaksi_penjualan');
//     Route::get('/laporan_barang_keluar', [BerandaController::class, 'laporan_barang_keluar'])->name('laporan_barang_keluar');
// });
