<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index() {
        $obats = Obat::all();
        return view('obat', compact('obats'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'satuan_obat' => 'required|string|max:255',
            'harga_obat' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat')->with('success', 'Obat added successfully.');
    }

    public function destroy($id) {
        $obat = Obat::find($id);

        if ($obat) {
            $obat->delete();
            return redirect()->route('obat')->with('success', 'Obat deleted successfully.');
        }

        return redirect()->route('obat')->with('error', 'Obat not found.');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'satuan_obat' => 'required|string|max:255',
            'harga_obat' => 'required|integer',
            'stok' => 'required|integer',
        ]);
    
        $obat = Obat::find($id);
    
        if ($obat) {
            $obat->update($request->all());
            return redirect()->route('obat')->with('success', 'Obat updated successfully.');
        }
    
        return redirect()->route('obat')->with('error', 'Obat not found.');
    }
}
