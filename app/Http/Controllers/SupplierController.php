<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;


class SupplierController extends Controller
{
    public function index() {
        $suppliers = Supplier::all();
        return view('supplier', compact('suppliers'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier')->with('success', 'supplier added successfully.');
    }

    public function destroy($id) {
        $supplier = Supplier::find($id);

        if ($supplier) {
            $supplier->delete();
            return redirect()->route('supplier')->with('success', 'supplier deleted successfully.');
        }

        return redirect()->route('supplier')->with('error', 'supplier not found.');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
        ]);
    
        $supplier = Supplier::find($id);
    
        if ($supplier) {
            $supplier->update($request->all());
            return redirect()->route('supplier')->with('success', 'supplier updated successfully.');
        }
    
        return redirect()->route('supplier')->with('error', 'supplier not found.');
    }
}
