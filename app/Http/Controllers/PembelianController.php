<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DBeli;
use App\Models\HBeli;
use App\Models\Hutang;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index(){
        $pembelian = HBeli::get();
        return view("pembelian.index", compact("pembelian"));
    }

    public function show($notransaksi){
        $pembelian = DBeli::where('NOTRANSAKSI', $notransaksi)->with('hbeli')->first();
        return view("pembelian.detail", compact("pembelian"));
    }
    
    public function create()
    {
        $supplierlist = Supplier::get(['KODESPL', 'NAMASPL']);
        $baranglist = Barang::get(['KODEBRG', 'NAMABRG', 'HARGABELI']);
    
        return view('pembelian.create', compact('supplierlist', 'baranglist'));
    }
    
    public function store(Request $request)
    { 
        $waktuSekarang = now();
        $tahun = $waktuSekarang->year;
        $bulan = sprintf("%02d", $waktuSekarang->month);

        $lastTransaction = HBeli::whereYear('TGLBELI', $tahun)
            ->whereMonth('TGLBELI', $bulan)
            ->orderBy('NOTRANSAKSI', 'desc')
            ->first();

        $nextTransactionNumber = 1;

        if ($lastTransaction) {
            $lastTransactionNumber = intval(substr($lastTransaction->NOTRANSAKSI, -3));
            $nextTransactionNumber = $lastTransactionNumber + 1;
        }

        $formattedTransactionNumber = sprintf("%03d", $nextTransactionNumber);
        $nomorTransaksi = 'B' . $tahun . $bulan . $formattedTransactionNumber;

        $validatedData = $request->validate([
            // 'NOTRANSAKSI' => 'required|max:10',
            'KODESPL' => 'required|max:10',
            'TGLBELI' => 'required',
            'KODEBRG' => 'required|max:10',
            'HARGABELI' => 'required|integer',
            'QTY' => 'required|integer',
            'DISKON' => 'required|integer',
            'DISKONRP' => 'required|integer',
            'TOTALRP' => 'required|integer'
        ]);

        $hBeli = HBeli::create(
            [
            'NOTRANSAKSI' => $nomorTransaksi,
            'KODESPL' => $validatedData['KODESPL'],
            'TGLBELI' => $validatedData['TGLBELI'],
        ]);

        $detailBeli = DBeli::create([
            'NOTRANSAKSI' => $hBeli->NOTRANSAKSI,
            'KODEBRG' => $validatedData['KODEBRG'],
            'HARGABELI' => $validatedData['HARGABELI'],
            'QTY' => $validatedData['QTY'],
            'DISKON' => $validatedData['DISKON'],
            'DISKONRP' => $validatedData['DISKONRP'],
            'TOTALRP' => $validatedData['TOTALRP'],
        ]);

        $kodeBrg = $request->input('KODEBRG');
        $qtyBeli = $request->input('QTY');

        $stock = Stock::where('KODEBRG', $kodeBrg)->first();

        if ($stock) {
            $stock->increment('QTYBELI', $qtyBeli);
        } else {
            Stock::create([
                'KODEBRG' => $kodeBrg,
                'QTYBELI' => $qtyBeli
            ]);
        }

        $batasPembayaran = 1000000;
        $totalPembelian = $request->input('TOTALRP');
        $totalHutang = $totalPembelian - $batasPembayaran;

        if ($totalPembelian > $batasPembayaran) {
            Hutang::create([
                'NOTRANSAKSI' => $nomorTransaksi,
                'KODESPL' => $validatedData['KODESPL'],
                'TGLBELI' => $validatedData['TGLBELI'],
                'TOTALHUTANG' => $totalHutang,
            ]);
        }

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil ditambahkan');
    }

    public function destroy($notransaksi){
        $dbeli = DBeli::where('NOTRANSAKSI', $notransaksi)->with('hbeli')->first();
        $hbeli = HBeli::where('NOTRANSAKSI', $notransaksi)->with('dbeli')->first();

        $dbeli->delete();
        $hbeli->delete();
    
        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus');
    }

    public function edit($notransaksi)
    {
        $supplierlist = Supplier::get(['KODESPL', 'NAMASPL']);
        $baranglist = Barang::get(['KODEBRG', 'NAMABRG', 'HARGABELI']);
        $pembelian = DBeli::where('NOTRANSAKSI', $notransaksi)->with('hbeli')->first();

        return view('pembelian.edit', compact('supplierlist', 'baranglist', 'pembelian'));
    }


    public function update(Request $request, $notransaksi) {
        $dbeli = DBeli::where('NOTRANSAKSI', $notransaksi)->with('hbeli')->first();
        $hbeli = HBeli::where('NOTRANSAKSI', $notransaksi)->with('dbeli')->first();
    
        $qtyBefore = $dbeli->QTY;
        $qtyAfter = $request->input('QTY');
    
        $dbeli->update($request->all());
        $hbeli->update($request->all());
    
        $qtyDifference = $qtyAfter - $qtyBefore;

        $kodeBrg = $request->input('KODEBRG');

        $stock = Stock::where('KODEBRG', $kodeBrg)->first();
    
        if ($stock) {
            $stock->increment('QTYBELI', $qtyDifference);
        } else {
            Stock::create([
                'KODEBRG' => $kodeBrg,
                'QTYBELI' => $qtyAfter
            ]);
        }

        $totalPembelian = $request->input('TOTALRP');
        $batasPembayaran = 1000000;
        $totalHutang = $totalPembelian - $batasPembayaran;

        $hutang = Hutang::where('NOTRANSAKSI', $notransaksi)->first();

        $validatedData = $request->validate([
            'KODESPL' => 'required|max:10',
            'TGLBELI' => 'required',
        ]);

        if ($totalPembelian < $batasPembayaran) {
            $hutang->delete();
        } else {
            if ($hutang) {
                $hutang->update([
                    'TOTALHUTANG' => $totalHutang
                ]);
            } else {
                if ($totalPembelian > $batasPembayaran) {
                    Hutang::create([
                        'NOTRANSAKSI' => $notransaksi,
                        'KODESPL' => $validatedData['KODESPL'],
                        'TGLBELI' => $validatedData['TGLBELI'],
                        'TOTALHUTANG' => $totalHutang,
                    ]);
                }
            }
        }
    
        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil diupdate');
    }
}
