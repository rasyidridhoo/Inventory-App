<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HBeli;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{
    public function index(){
        $totalBarang = Barang::count();
        $totalSupplier = Supplier::count();
        $totalPembelian = HBeli::count();
        $stockBarang = Stock::with('barang')->get();
        return view("main.index", compact("totalBarang", "totalSupplier", "totalPembelian", "stockBarang"));
    }

}
