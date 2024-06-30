<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatKeluar;
use App\Models\Obat;

class ObatKeluarController extends Controller
{
    public function index() {
        $obat_keluars = ObatKeluar::all(); // Fetch all obat_masuk records
        $obats = Obat::all(); // Fetch all obat records if needed
        // return view('obat_masuk', compact('obat_masuks'));
        return view('obat_keluar', compact('obat_keluars', 'obats'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'id_obat' => 'required|exists:obat,id_obat',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $obat = Obat::find($request->id_obat);

        if (!$obat) {
            return redirect()->route('obat_keluar')->with('error', 'Obat not found.');
        }

        ObatKeluar::create([
            'id_obat' => $request->id_obat,
            'nama_obat' => $obat->nama_obat,
            'jumlah_keluar' => $request->jumlah_keluar,
            'tanggal' => $request->tanggal, // Pastikan menggunakan nama kolom yang sesuai dengan yang ada di tabel
        ]);

        $obat->stok -= $request->jumlah_keluar;
        $obat->save();
        
        return redirect()->route('obat_keluar')->with('success', 'Obat keluar added successfully.');
    }

    public function edit($id)
    {
        $obat_keluar = ObatKeluar::find($id);

        if (!$obat_keluar) {
            return redirect()->route('obat_keluar')->with('error', 'Obat keluar not found.');
        }

        $obats = Obat::all(); // Fetch all obats for the dropdown

        return view('obat_keluar', compact('obat_keluar', 'obats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_obat' => 'required|exists:obat,id_obat',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $obat_keluar = ObatKeluar::find($id);

        if (!$obat_keluar) {
            return redirect()->route('obat_keluar')->with('error', 'Obat keluar not found.');
        }

        $obat = Obat::find($request->id_obat);

        if (!$obat) {
            return redirect()->route('obat_keluar')->with('error', 'Obat not found.');
        }

        $obat_keluar->id_obat = $request->id_obat;
        $obat_keluar->nama_obat = $obat->nama_obat;
        $obat_keluar->jumlah_keluar = $request->jumlah_keluar;
        $obat_keluar->tanggal = $request->tanggal; // Pastikan menggunakan nama kolom yang sesuai dengan yang ada di tabel
        $obat_keluar->save();

        return redirect()->route('obat_keluar')->with('success', 'Obat keluar updated successfully.');
    }

    public function destroy($id) {
        $obat_keluar = ObatKeluar::find($id);

        if (!$obat_keluar) {
            return redirect()->route('obat_keluar')->with('error', 'Obat keluar not found.');
        }

        $obat_keluar->delete();

        return redirect()->route('obat_keluar')->with('success', 'Obat keluar deleted successfully.');
    }
}
