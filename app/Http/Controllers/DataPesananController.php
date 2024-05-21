<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPesanan;

class DataPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPesanan = DataPesanan::all();
        return view('Halaman.DataPesanan.data_pesanan', compact('dataPesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Halaman.DataPesanan.create_pesanan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kd_pelanggan' => 'required',
            'tanggal' => 'required',
            'nama_pelanggan' => 'required',
            'nama_pesanan' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        DataPesanan::create($request->all());

        return redirect()->route('data_pesanan')->with('success', 'Pesanan berhasil ditambahkan.');
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

        $pesanan = DataPesanan::findOrFail($id);
        return view('Halaman.DataPesanan.edit_pesanan', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kd_pelanggan' => 'required',
            'tanggal' => 'required',
            'nama_pelanggan' => 'required',
            'nama_pesanan' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $pesanan = DataPesanan::findOrFail($id);
        $pesanan->update($request->all());
        return redirect()->route('data_pesanan')->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DataPesanan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pesanan berhasil dihapus.');
    }
}
