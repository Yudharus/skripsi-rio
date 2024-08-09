<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\ObatKeluar;
use App\Models\Supplier;


class ObatController extends Controller
{
    public function index() {
        // $obats = Obat::join('obat_keluar', 'obat.id_obat', '=', 'obat_keluar.id_obat')
        // ->select('obat.*', 'obat_keluar.jumlah_keluar')
        // ->get();
        $suppliers = Supplier::all();

        $obats = Obat::all();

        return view('obat', compact('obats', 'suppliers'));
    }

    public function indexStok() {
        // $obats = Obat::join('obat_keluar', 'obat.id_obat', '=', 'obat_keluar.id_obat')
        // ->select('obat.*', 'obat_keluar.jumlah_keluar')
        // ->get();
        $suppliers = Supplier::all();

        $obats = Obat::all();

        return view('stok_obat', compact('obats', 'suppliers'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'satuan_obat' => 'required|string|max:255',
            'harga_obat' => 'required|numeric',
            'stok' => 'required|numeric',
            'id_supplier' => 'required|integer',
        ]);

        $supplier = Supplier::find($request->id_supplier);

        if (!$supplier) {
            return redirect()->route('obat')->with('error', 'Supplier not found.');
        }

        Obat::create([
            'nama_obat' => $request->nama_obat,
            'satuan_obat' => $request->satuan_obat,
            'harga_obat' => $request->harga_obat,
            'stok' => $request->stok,
            'id_supplier' => $supplier->id_supplier,
            'supplier' => $supplier->nama_supplier,
            'history' => $request->history,

        ]);
        
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
            'harga_obat' => 'required|numeric',
            'stok' => 'required|numeric',
            'id_supplier' => 'required|integer',
        ]);
    
        $obat = Obat::find($id);
    
        if ($obat) {
            $supplier = Supplier::find($request->id_supplier);
    
            if (!$supplier) {
                return redirect()->route('obat')->with('error', 'Supplier not found.');
            }
    
            $obat->update([
                'nama_obat' => $request->nama_obat,
                'satuan_obat' => $request->satuan_obat,
                'harga_obat' => $request->harga_obat,
                'stok' => $request->stok,
                'id_supplier' => $supplier->id_supplier,
                'supplier' => $supplier->nama_supplier,
            ]);
    
            return redirect()->route('obat')->with('success', 'Obat updated successfully.');
        }
    
        return redirect()->route('obat')->with('error', 'Obat not found.');
    }
}
