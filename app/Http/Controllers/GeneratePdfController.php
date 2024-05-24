<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPesanan;
use DB;
use PDF;



class GeneratePdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function pdflaporanMenu()
    {
        $orders = DB::table('pesanan_pelanggan')->get();

        $menuSales = [];
        foreach ($orders as $order) {
            $menus = explode(',', $order->kd_menu);
            foreach ($menus as $menu) {
                if (isset($menuSales[$menu])) {
                    $menuSales[$menu]++;
                } else {
                    $menuSales[$menu] = 1;
                }
            }
        }
        $pesananPelanggan = DB::table('data_menu')
            ->whereIn('kd_menu', array_keys($menuSales))
            ->get()
            ->map(function ($menu) use ($menuSales) {
                return [
                    'kd_menu' => $menu->kd_menu,
                    'nama_menu' => $menu->nama_menu,
                    'jumlah_terjual' => $menuSales[$menu->kd_menu]
                ];
            });

        $pdf = PDF::loadView('TemplatePdf.pdf_laporan_menu', compact('pesananPelanggan'));
        return $pdf->download('laporan_menu.pdf');

    }
    public function pdflaporanPesanan()
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
        $pdf = PDF::loadView('TemplatePdf.pdf_laporan_pesanan', compact('dataPesanan'));
        return $pdf->download('laporan_pesanan.pdf');
    }
    public function pdflaporanStock()
    {
        $stock= DB::table('data_barang')->get();
        $pdf = PDF::loadView('TemplatePdf.pdf_laporan_stock', compact('stock'));
        return $pdf->download('laporan_stock.pdf');
    }
    public function pdflaporanTransaksi()
    {
        $arr=[];
        $dataTransaksi = DB::table('pesanan_pelanggan')
            ->leftJoin('data_menu', 'pesanan_pelanggan.kd_menu', '=', 'data_menu.kd_menu')
            ->leftJoin('data_transaksi','pesanan_pelanggan.id', '=', 'data_transaksi.id_pesanan')
            ->select('pesanan_pelanggan.*', 'data_menu.nama_menu', 'data_transaksi.total_harga', 'data_transaksi.tanggal_pembayaran','data_transaksi.id as id_transaksi')
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
        $pdf = PDF::loadView('TemplatePdf.pdf_laporan_transaksi', compact('dataTransaksi'));
        return $pdf->download('laporan_transaksi.pdf');
    }
    public function pdflaporanBarangKeluar()
    {
        $orders = DB::table('pesanan_pelanggan')
            ->select('kd_menu', DB::raw('DATE(created_at) as tanggal'))
            ->get();

        $barangKeluar = [];

        foreach ($orders as $order) {
            $tanggal = $order->tanggal;
            $menus = explode(',', $order->kd_menu);

            foreach ($menus as $menuCode) {
                $menu = DB::table('data_menu')->where('kd_menu', $menuCode)->first();
                if ($menu) {
                    $barangCodes = explode(',', $menu->kd_barang);
                    foreach ($barangCodes as $barangCode) {
                        if (!isset($barangKeluar[$tanggal])) {
                            $barangKeluar[$tanggal] = [];
                        }

                        if (isset($barangKeluar[$tanggal][$barangCode])) {
                            $barangKeluar[$tanggal][$barangCode]++;
                        } else {
                            $barangKeluar[$tanggal][$barangCode] = 1;
                        }
                    }
                }
            }
        }

        $result = [];
        foreach ($barangKeluar as $tanggal => $barangPerHari) {
            foreach ($barangPerHari as $barangCode => $jumlahKeluar) {
                $barang = DB::table('data_barang')->where('kd_barang', $barangCode)->first();
                if ($barang) {
                    $result[] = [
                        'kd_barang' => $barang->kd_barang,
                        'nama_barang' => $barang->nama_barang,
                        'jumlah_keluar' => $jumlahKeluar,
                        'tanggal_keluar' => $tanggal
                    ];
                }
            }
        }

        $pdf = PDF::loadView('TemplatePdf.pdf_laporan_barang_keluar', compact('result'));
        return $pdf->download('laporan_barang_keluar.pdf');
    }
}
