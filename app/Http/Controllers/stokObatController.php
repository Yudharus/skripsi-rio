<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use App\Models\stokObat;
use App\Models\Supplier;



use Illuminate\Http\Request;

class stokObatController extends Controller
{
    public function index() {
        $stok_obats = stokObat::all();
        $obats = Obat::all();

        return view('stok_obat', compact('stok_obats', 'obats'));
    }

    public function store(Request $request) {
        $obat = Obat::find($request->id_obat);

        if (!$obat) {
            return redirect()->route('stok_obat')->with('error', 'Obat not found.');
        }

        stokObat::create([
            'nama' => $obat->nama_obat,
            'satuan' => $request->satuan,
            'stok_awal' => $request->stok_awal,
            'stok_akhir' => $request->stok_akhir,
        ]);

        return redirect()->route('stok_obat')->with('success', 'Stok Obat added successfully.');
    }

    public function destroy($id) {
        $stokObat = stokObat::find($id);

        if ($stokObat) {
            $stokObat->delete();
            return redirect()->route('stok_obat')->with('success', 'Stok Obat deleted successfully.');
        }

        return redirect()->route('stok_obat')->with('error', 'Stok Obat not found.');
    }

    public function update(Request $request, $id) {
        $stokObat = stokObat::find($id);
    
        if ($stokObat) {
            $stokObat->update([
                'satuan' => $request->satuan,
                'stok_awal' => $request->stok_awal,
                'stok_akhir' => $request->stok_akhir,
            ]);
    
            return redirect()->route('stok_obat')->with('success', 'Stok Obat updated successfully.');
        }
    
        return redirect()->route('stok_obat')->with('error', 'Stok Obat not found.');
    }
}
