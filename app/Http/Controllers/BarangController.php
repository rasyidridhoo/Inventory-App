<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){

       $barang = Barang::get();
       return view('barang.index', compact(['barang']));
    }

    public function create(){
        return view('barang.create');
    }

    public function store(Request $request){

        $validatedBarang = $request->validate([
            'KODEBRG' => 'required|string|max:10|unique:barangs,KODEBRG',
            'NAMABRG' => 'required|string|max:100',
            'SATUAN' => 'required|string|max:10',
            'HARGABELI' => 'required|integer',
        ]);

        try{
            Barang::create($validatedBarang);
            return redirect()->route('barang.index')->with('success','Data berhasil ditambahkan');
        } catch(\Exception $e){
            return redirect()->route('barang.index')->with('success','Data gagal ditambahkan'.$e->getMessage());
        }
        
    }

    public function destroy($id){
        $barang = Barang::findOrFail($id);
        try{
            $barang->delete();
            return redirect()->route('barang.index')->with('success','Data berhasil dihapus');
        } catch(\Exception $e){
            return redirect()->route('barang.index')->with('success','Data gagal dihapus'.$e->getMessage());
        }
    }

    public function edit($id){
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact(['barang']));

    }

    public function update(Request $request, $id){
        $validatedBarang = $request->validate([
            'KODEBRG' => 'required|string|max:10|unique:barangs,KODEBRG,' . $id,
            'NAMABRG' => 'required|string|max:100',
            'SATUAN' => 'required|string|max:10',
            'HARGABELI' => 'required|integer',
        ]);
        
        $barang = Barang::findOrFail($id);

        try {
            $barang->update($validatedBarang);
            return redirect()->route('barang.index')->with('success','Data berhasil diupdate');
        } catch(\Exception $e) {
            return redirect()->route('barang.index')->with('success','Data gagal diupdate'.$e->getMessage());
        }
    }

}
