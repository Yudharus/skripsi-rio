<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\ObatMasuk;
use App\Models\ObatKeluar;
use Carbon\Carbon;


class RopEoqController extends Controller
{
    public function index()
    {
        $obats = Obat::all(); // Ambil semua data dari tabel obat

        $data = [];
        
        foreach ($obats as $obat) {
            $obatMasuk = ObatMasuk::where('id_obat', $obat->id_obat)->first();
        
            if ($obatMasuk) {
                $harga_obat = $obat->harga_obat;
                $jumlah_masuk = $obatMasuk->jumlah_masuk;
                $biaya_pemesanan = $obatMasuk->biaya_pemesanan;
                $tanggal = $obatMasuk->tanggal;
                
                // Hitung total biaya penyimpanan (holding cost)
                $total_biaya_penyimpanan = floor($harga_obat * 0.26);
        
                // Hitung EOQ
                $eoq = sqrt((2 * $jumlah_masuk * $biaya_pemesanan) / $total_biaya_penyimpanan);
        
                // Hitung maxPenjualan dan avgPenjualan dalam 7 hari terakhir
                $sevenDaysAgo = Carbon::now()->subDays(7);
                $obatKeluar = ObatKeluar::where('id_obat', $obat->id_obat)
                    ->where('tanggal', '>=', $sevenDaysAgo)
                    ->pluck('jumlah_keluar');
                
                if ($obatKeluar->count() > 0) {
                    $maxPenjualan = $obatKeluar->max();
                    $avgPenjualan = $obatKeluar->avg();
                    
                    // Hitung safetyStock dan ROP
                    $safetyStock = ($maxPenjualan * 1) - ($avgPenjualan * 1);
                    $rop = ($avgPenjualan * 1) + $safetyStock;
                } else {
                    $maxPenjualan = 0;
                    $avgPenjualan = 0;
                    $safetyStock = 0;
                    $rop = 0;
                }
        
                // Simpan data yang diperlukan
                $data[] = [
                    'id_obat' => $obat->id_obat,
                    'nama_obat' => $obat->nama_obat,
                    'satuan_obat' => $obat->satuan_obat,
                    'harga_obat' => $obat->harga_obat,
                    'stok' => $obat->stok,
                    'jumlah_masuk' => $jumlah_masuk,
                    'biaya_pemesanan' => $biaya_pemesanan,
                    'total_biaya_penyimpanan' => $total_biaya_penyimpanan,
                    'tanggal' => $tanggal,
                    'safety_stock' => $safetyStock,
                    'eoq' => $eoq,
                    'rop' => $rop,
                    'penjualan_maksimal' => $maxPenjualan,
                    'rata_rata' => $avgPenjualan,
                    'stock_akhir' => $obat->stok

                ];
            }
        }


        return view('ropeoq', compact('data'));
    }
}
