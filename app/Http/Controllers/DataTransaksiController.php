<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataTransaksi;

class DataTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataTransaksi = DataTransaksi::all();
        return view('Halaman.DataTransaksi.data_transaksi', compact('dataTransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Halaman.DataTransaksi.create_transaksi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'tanggal_penjualan' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        DataTransaksi::create($request->all());

        return redirect()->route('data_transaksi')->with('success', 'transaksi berhasil ditambahkan.');
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

        $transaksi = DataTransaksi::findOrFail($id);
        return view('Halaman.DataTransaksi.edit_transaksi', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'tanggal_penjualan' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $transaksi = DataTransaksi::findOrFail($id);
        $transaksi->update($request->all());
        return redirect()->route('data_transaksi')->with('success', 'transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DataTransaksi::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'transaksi berhasil dihapus.');
    }
}
