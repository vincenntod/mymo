<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataStock;

class DataStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stock = Datastock::all();
        return view('Halaman.Datastock.data_stock', compact('stock'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Halaman.Datastock.create_stock');
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

        Datastock::create($request->all());

        return redirect()->route('data_stock')->with('success', 'stock berhasil ditambahkan.');
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

        $stock = Datastock::findOrFail($id);
        return view('Halaman.Datastock.edit_stock', compact('stock'));
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

        $stock = Datastock::findOrFail($id);
        $stock->update($request->all());
        return redirect()->route('data_stock')->with('success', 'stock berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Datastock::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'stock berhasil dihapus.');
    }
}
