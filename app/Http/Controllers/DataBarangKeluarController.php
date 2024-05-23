<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarangKeluar;
use DB;

class DataBarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBarangKeluar = DB::table('barang_keluar')
        ->leftjoin('data_barang', 'barang_keluar.kd_barang', '=', 'data_barang.kd_barang')
        ->select('barang_keluar.*', 'data_barang.nama_barang')
        ->get();
        return view('Halaman.DataBarangKeluar.data_barang_keluar', compact('dataBarangKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Halaman.DataBarangKeluar.create_data_barang_keluar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
        ]);

        DataBarangKeluar::create($request->all());

        return redirect()->route('data_barang_keluar')->with('success', 'dataBarangKeluar berhasil ditambahkan.');
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

        $dataBarangKeluar = DataBarangKeluar::findOrFail($id);
        return view('Halaman.DataBarangKeluar.edit_data_barang_keluar', compact('dataBarangKeluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
        ]);

        $dataBarangKeluar = DataBarangKeluar::findOrFail($id);
        $dataBarangKeluar->update($request->all());
        return redirect()->route('data_barang_keluar')->with('success', 'Data Barang Keluar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DataBarangKeluar::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data Barang Keluar berhasil dihapus.');
    }
}
