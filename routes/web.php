<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\MainMenuController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/main', [MainMenuController::class, 'index'])->name('main.index');

//Barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::delete('/barang/{id}/delete', [BarangController::class, 'destroy'])->name('barang.destroy');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{id}/update', [BarangController::class, 'update'])->name('barang.update');

//Supplier
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::delete('/supplier/{id}/delete', [SupplierController::class, 'destroy'])->name('supplier.destroy');
Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('/supplier/{id}/update', [SupplierController::class, 'update'])->name('supplier.update');

//Pembelian
Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
Route::get('/pembelian/{notransaksi}/show', [PembelianController::class, 'show'])->name('pembelian.show');
Route::get('/pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');
Route::delete('/pembelian/{notransaksi}/delete', [PembelianController::class, 'destroy'])->name('pembelian.destroy');
Route::get('/pembelian/{notransaksi}/edit', [PembelianController::class, 'edit'])->name('pembelian.edit');
Route::put('/pembelian/{notransaksi}/update', [PembelianController::class, 'update'])->name('pembelian.update');