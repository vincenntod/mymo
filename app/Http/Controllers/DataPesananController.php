<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPesanan;
use App\Models\DataMenu;
use App\Models\DataTransaksi;

use DB;

class DataPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arr=[];
        $dataPesanan = DB::table('pesanan_pelanggan')
            ->leftJoin('data_menu', 'pesanan_pelanggan.kd_menu', '=', 'data_menu.kd_menu')
            ->leftJoin('data_transaksi','pesanan_pelanggan.id', '=', 'data_transaksi.id_pesanan')
            ->select('pesanan_pelanggan.*', 'data_menu.nama_menu', 'data_transaksi.total_harga', 'data_transaksi.tanggal_pembayaran')
            ->get();


        foreach ($dataPesanan as $dataPesanans) {
            $arr = explode(',',$dataPesanans->kd_menu);
            
            if (is_array($arr)) {
                $listMenu = DB::table('data_menu')
                                ->whereIn('kd_menu', $arr)
                                ->pluck('nama_menu');
                $dataPesanans->nama_menu = implode(", ",$listMenu->toArray());
            } else {
                $dataPesanans->nama_menu = [];
            }
        }
        return view('Halaman.DataPesanan.data_pesanan', compact('dataPesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = DataMenu::all();
        return view('Halaman.DataPesanan.create_pesanan', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $arr = $request->jumlahitem;
        $list_menu = $request->kd_menu;
        $jmlPesanan = array_filter($arr, function($value) {
            return $value !== "0";
        });

        $jmlPesanan = array_values($jmlPesanan);

        foreach ($jmlPesanan as $index => $jumlah) {
            for ($i = 0; $i < $jumlah; $i++) {
                $expanded_kd_menu[] = $list_menu[$index];
            }
        }
        
        
        $data = $request->validate([
            'nama_pelanggan' => 'required',
            'kd_menu' => 'required',
        ]);
        $data['status_order'] = "Sudah di pesan";
        $data['kd_menu'] = implode(',', $expanded_kd_menu);
        
        $totalHarga= [];
        for($i=0; $i < count($expanded_kd_menu); $i++){
            $listMenu = DB::table('data_menu')->select('kd_menu','harga','kd_barang')
            ->where('kd_menu', $expanded_kd_menu[$i])->get();
            array_push($totalHarga,intval($listMenu[0]->harga));
            $totalMenu = explode(',', $listMenu[0]->kd_barang);
            
            for($j=0; $j< count($totalMenu); $j++){
                $listBarang = DB::table('data_barang')->select('stock')
                ->where('kd_barang', $totalMenu[$j])->get();
                $minus = $listBarang[0]->stock-1;

                DB::table('data_barang')->where('kd_barang',$totalMenu[$j])->update([
                    'stock' => $minus,
                ]);

                DB::table('barang_keluar')->insert([
                    "kd_barang" => $totalMenu[$j],
                    "tanggal_keluar" => date('Y-m-d H:i:s'),
                ]);
            }
        }
        
        $newDataPesanan = DataPesanan::create($data);
        DB::table('data_transaksi')->insert([
            'id_pesanan' => $newDataPesanan->id,
            'total_harga' => array_sum($totalHarga),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);



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
        $menu = DataMenu::all();
        return view('Halaman.DataPesanan.edit_pesanan', compact('pesanan','menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $arr = $request->jumlahitem;
        $list_menu = $request->kd_menu;
        $jmlPesanan = array_filter($arr, function($value) {
            return $value !== "0";
        });

        $jmlPesanan = array_values($jmlPesanan);

        foreach ($jmlPesanan as $index => $jumlah) {
            for ($i = 0; $i < $jumlah; $i++) {
                $expanded_kd_menu[] = $list_menu[$index];
            }
        }
        
        
        $data = $request->validate([
            'nama_pelanggan' => 'required',
            'kd_menu' => 'required',
        ]);
        $data['status_order'] = "Sudah di pesan";
        $data['kd_menu'] = implode(',', $expanded_kd_menu);

        $pesanan = DataPesanan::findOrFail($id);
        $pesanan->update($data);

        $totalHarga= [];
        for($i=0; $i < count($expanded_kd_menu); $i++){
            $listMenu = DB::table('data_menu')->select('kd_menu','harga')
            ->where('kd_menu', $expanded_kd_menu[$i])->get();
            array_push($totalHarga,intval($listMenu[0]->harga));
        }

        DB::table('data_transaksi')->where('id_pesanan',$id)->update([
            'id_pesanan' => $pesanan->id,
            'total_harga' => array_sum($totalHarga),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


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
