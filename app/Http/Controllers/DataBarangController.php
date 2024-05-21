<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $databarang = DataBarang::all();
        return view('Halaman.DataBarang.data_barang', compact('databarang'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Halaman.DataBarang.create_barang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'stok_barang' => 'required',
        ]);

        
        DataBarang::create($data);

        return redirect()->route('data_barang')->with('success', 'Barang berhasil ditambahkan.');
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
        $barang = DataBarang::findOrFail($id);
        return view('Halaman.DataBarang.edit_barang', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'stok_barang' => 'required',
        ]);

        $barang = DataBarang::findOrFail($id);
        $barang->update($request->all());
        return redirect()->route('data_barang')->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DataBarang::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Barang berhasil dihapus.');
    }

    public function cetak()
    {
        $databarang = DataBarang::all();
        return view('Halaman.DataBarang.cetak_barang', compact('databarang'));
    }
}
