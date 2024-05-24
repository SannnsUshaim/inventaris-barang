<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PemakaianController;    
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('barang/store', [BarangController::class, 'store'])->name('barang.store');
    Route::get('barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('barang/{id}/update', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('barang/delete', [BarangController::class, 'destroy'])->name('barang.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');
    Route::get('pembelian/{id}/edit', [PembelianController::class, 'edit'])->name('pembelian.edit');
    Route::put('pembelian/{id}/update', [PembelianController::class, 'update'])->name('pembelian.update');
    Route::delete('pembelian/delete', [PembelianController::class, 'destroy'])->name('pembelian.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('pemakaian', [PemakaianController::class, 'index'])->name('pemakaian.index');
    Route::get('pemakaian/create', [PemakaianController::class, 'create'])->name('pemakaian.create');
    Route::post('pemakaian/store', [PemakaianController::class, 'store'])->name('pemakaian.store');
    Route::get('pemakaian/{id}/edit', [PemakaianController::class, 'edit'])->name('pemakaian.edit');
    Route::put('pemakaian/{id}/update', [PemakaianController::class, 'update'])->name('pemakaian.update');
    Route::delete('pemakaian/delete', [PemakaianController::class, 'destroy'])->name('pemakaian.destroy');
});

require __DIR__.'/auth.php';
