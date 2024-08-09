<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatMasuk;
use App\Models\Obat;


class ObatMasukController extends Controller
{
    public function index() {
        $obat_masuks = ObatMasuk::all(); // Fetch all obat_masuk records
        $obats = Obat::all(); // Fetch all obat records if needed
        // return view('obat_masuk', compact('obat_masuks'));
        return view('obat_masuk', compact('obat_masuks', 'obats'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'id_obat' => 'required|exists:obat,id_obat',
            'jumlah_masuk' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'biaya_pemesanan' => 'required|integer|min:1',
        ]);

        $obat = Obat::find($request->id_obat);

        if (!$obat) {
            return redirect()->route('obat_masuk')->with('error', 'Obat not found.');
        }

        ObatMasuk::create([
            'id_obat' => $request->id_obat,
            'nama_obat' => $obat->nama_obat,
            'jumlah_masuk' => $request->jumlah_masuk,
            'tanggal' => $request->tanggal, // Pastikan menggunakan nama kolom yang sesuai dengan yang ada di tabel
            'biaya_pemesanan' => $request->biaya_pemesanan,

        ]);

        $obat->stok_akhir += $request->jumlah_masuk;
        $obat->save();    

        return redirect()->route('obat_masuk')->with('success', 'Obat masuk added successfully.');
    }

    public function edit($id)
    {
        $obat_masuk = ObatMasuk::find($id);

        if (!$obat_masuk) {
            return redirect()->route('obat_masuk')->with('error', 'Obat masuk not found.');
        }

        $obats = Obat::all(); // Fetch all obats for the dropdown

        return view('obat_masuk', compact('obat_masuk', 'obats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_obat' => 'required|exists:obat,id_obat',
            'jumlah_masuk' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'biaya_pemesanan' => 'required|integer|min:1',

            
        ]);

        $obat_masuk = ObatMasuk::find($id);

        if (!$obat_masuk) {
            return redirect()->route('obat_masuk')->with('error', 'Obat masuk not found.');
        }

        $obat = Obat::find($request->id_obat);

        if (!$obat) {
            return redirect()->route('obat_masuk')->with('error', 'Obat not found.');
        }

        $obat_masuk->id_obat = $request->id_obat;
        $obat_masuk->nama_obat = $obat->nama_obat;
        $obat_masuk->jumlah_masuk = $request->jumlah_masuk;
        $obat_masuk->tanggal = $request->tanggal; // Pastikan menggunakan nama kolom yang sesuai dengan yang ada di tabel
        $obat_masuk->biaya_pemesanan = $request->biaya_pemesanan;

        $obat_masuk->save();

        return redirect()->route('obat_masuk')->with('success', 'Obat masuk updated successfully.');
    }

    public function destroy($id) {
        $obat_masuk = ObatMasuk::find($id);

        if (!$obat_masuk) {
            return redirect()->route('obat_masuk')->with('error', 'Obat masuk not found.');
        }

        $obat_masuk->delete();

        return redirect()->route('obat_masuk')->with('success', 'Obat masuk deleted successfully.');
    }
}
