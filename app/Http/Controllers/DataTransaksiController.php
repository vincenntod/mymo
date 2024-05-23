<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataTransaksi;
use DB;

class DataTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arr=[];
        $dataTransaksi = DB::table('pesanan_pelanggan')
            ->leftJoin('data_menu', 'pesanan_pelanggan.kd_menu', '=', 'data_menu.kd_menu')
            ->leftJoin('data_transaksi','pesanan_pelanggan.id', '=', 'data_transaksi.id_pesanan')
            ->select('pesanan_pelanggan.*', 'data_menu.nama_menu', 'data_transaksi.total_harga', 'data_transaksi.tanggal_pembayaran')
            ->get();


        foreach ($dataTransaksi as $dataTransaksis) {
            $arr = explode(',',$dataTransaksis->kd_menu);
            
            if (is_array($arr)) {
                $listMenu = DB::table('data_menu')
                                ->whereIn('kd_menu', $arr)
                                ->pluck('nama_menu');
                $dataTransaksis->nama_menu = implode(", ",$listMenu->toArray());
            } else {
                $dataTransaksis->nama_menu = [];
            }
        }
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
    public function payment(string $id){
        DB::table('data_transaksi')->where('id_pesanan', $id)->update([
            'tanggal_pembayaran' => date('Y-m-d H:i:s')
        ]);

         DB::table('pesanan_pelanggan')->where('id', $id)->update([
            'status_order' => 'Paid'
        ]);
        return redirect()->route('data_transaksi')->with('success', 'transaksi berhasil diperbarui.');
    }
}
