<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMenu;

class DataMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datamenu = DataMenu::all();
        return view('Halaman.DataMenu.data_menu', compact('datamenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Halaman.DataMenu.create_menu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);

        DataMenu::create($request->all());

        return redirect()->route('data_menu')->with('success', 'Menu berhasil ditambahkan.');
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

        $menu = DataMenu::findOrFail($id);
        return view('Halaman.DataMenu.edit_menu', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);
        $barang = DataMenu::findOrFail($id);
        $barang->update($request->all());
        return redirect()->route('data_menu')->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DataMenu::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Menu berhasil dihapus.');
    }
}
