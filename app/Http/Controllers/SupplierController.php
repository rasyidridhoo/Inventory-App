<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $supplier = Supplier::get();
        return view("supplier.index", compact(['supplier']));
    }

    public function create(){
        return view('supplier.create');
    }

    public function store(Request $request){

        $validatedSupplier = $request->validate([
            'KODESPL' => 'required|string|max:10|unique:suppliers,KODESPL',
            'NAMASPL' => 'required|string|max:100',
        ]);

        try{
            Supplier::create($validatedSupplier);
            return redirect()->route('supplier.index')->with('success','Data berhasil ditambahkan');
        } catch(\Exception $e){
            return redirect()->route('supplier.index')->with('success','Data gagal ditambahkan\n'.$e->getMessage());
        }
        
    }

    public function destroy($id){
        $supplier = Supplier::findOrFail($id);
        try{
            $supplier->delete();
            return redirect()->route('supplier.index')->with('success','Data berhasil dihapus');
        } catch(\Exception $e){
            return redirect()->route('supplier.index')->with('success','Data gagal dihapus\n'.$e->getMessage());
        }
    }

    public function edit($id){
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact(['supplier']));

    }

    public function update(Request $request, $id){
        $validatedSupplier = $request->validate([
            'KODESPL' => 'required|string|max:10|unique:suppliers,KODESPL,' . $id,
            'NAMASPL' => 'required|string|max:100',
        ]);
        
        $supplier = Supplier::findOrFail($id);

        try {
            $supplier->update($validatedSupplier);
            return redirect()->route('supplier.index')->with('success','Data berhasil diupdate');
        } catch(\Exception $e) {
            return redirect()->route('supplier.index')->with('success','Data gagal diupdate\n'.$e->getMessage());
        }
    }
}
