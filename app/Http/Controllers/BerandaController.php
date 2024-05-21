<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $var_nama = "kerynID";
        return view('HalamanDepan.beranda', compact('var_nama'));
    }

    public function databarang()
    {
        return view('Halaman.DataBarang.data_barang');
    }
    public function datamenu()
    {
        return view('Halaman.DataMenu.data_menu');
    }
    public function pesanpelanggan()
    {
        return view('Halaman.PesananPelanggan.data_pesanan.form');
    }
    public function stockbarang()
    {
        return view('Halaman.stock_barang');
    }
    public function transaksi()
    {
        return view('Halaman.transaksi');
    }
    public function laporanmenuterlaris()
    {
        return view('Halaman.laporan_menu_terlaris');
    }
    public function laporanpesananpelanggan()
    {
        return view('Halaman.laporan_pesanan_pelanggan');
    }
    public function laporanstockbarang()
    {
        return view('Halaman.laporan_stock_barang');
    }
    public function laporantransaksipenjualan()
    {
        return view('Halaman.laporan_transaksi_penjualan');
    }
    public function laporanbarangkeluar()
    {
        return view('Halaman.laporan_barang_keluar');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
