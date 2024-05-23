<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMenu;
use App\Models\DataBarang;
use DB;

class DataMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arr=[];
        $datamenu = DB::table('data_menu')
            ->leftJoin('data_barang', 'data_menu.kd_barang', '=', 'data_barang.kd_barang')
            ->select('data_menu.*', 'data_barang.nama_barang')
            ->get();

        foreach ($datamenu as $datamenus) {
            $arr = explode(',',$datamenus->kd_barang);
            
            if (is_array($arr)) {
                $listBarang = DB::table('data_barang')
                                ->whereIn('kd_barang', $arr)
                                ->pluck('nama_barang');
                $datamenus->nama_barang = implode(", ",$listBarang->toArray());
            } else {
                $datamenus->nama_barang = [];
            }
        }
        return view('Halaman.DataMenu.data_menu', compact('datamenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = DataBarang::all();
        return view('Halaman.DataMenu.create_menu', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kd_menu' => 'required',
            'kd_barang' => 'required',
            'nama_menu' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);
        $data['kd_barang'] = implode(',', $data['kd_barang']);

        DataMenu::create($data);

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
        $barang = DataBarang::all();
        return view('Halaman.DataMenu.edit_menu', compact('menu', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'kd_menu' => 'required',
            'kd_barang' => 'required',
            'nama_menu' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);
        $data['kd_barang'] = implode(',', $data['kd_barang']);

        $barang = DataMenu::findOrFail($id);
        $barang->update($data);
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
