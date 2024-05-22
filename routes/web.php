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
    Route::get('barang/{id_barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::patch('barang/{id_barang}/update', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('barang/{id}/delete', [BarangController::class, 'destroy'])->name('barang.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('barang/store', [PembelianController::class, 'store'])->name('pembelian.store');
    Route::get('pembelian/{id_pembelian}/edit', [PembelianController::class, 'edit'])->name('pembelian.edit');
    Route::patch('pembelian/{id_pembelian}/update', [PembelianController::class, 'update'])->name('pembelian.update');
    Route::delete('pembelian/{id}/delete', [PembelianController::class, 'destroy'])->name('pembelian.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('pemakaian', [PemakaianController::class, 'index'])->name('pemakaian.index');
    Route::get('pemakaian/create', [PemakaianController::class, 'create'])->name('pemakaian.create');
    Route::post('pemakaian/store', [PemakaianController::class, 'store'])->name('pemakaian.store');
    Route::get('pemakaian/{id_pemakaian}/edit', [PemakaianController::class, 'edit'])->name('pemakaian.edit');
    Route::patch('pemakaian/{id_pemakaian}/update', [PemakaianController::class, 'update'])->name('pemakaian.update');
    Route::delete('pemakaian/{id}/delete', [PemakaianController::class, 'destroy'])->name('pemakaian.destroy');
});

// Grouping routes with common middleware 'auth' and 'verified'
Route::middleware(['auth', 'verified'])->group(function () {
    // Admin route
    Route::get('admin', function() {
        return view('layouts.admin.index');
    })->middleware('role:admin')->name('admin.index');

    // Operator route
    Route::get('operator', function() {
        return view('layouts.user.index');
    })->middleware('role:operator|admin')->name('operator.index');

    // Staff route
    Route::get('staff', function() {
        return view('layouts.user.index');
    })->middleware('role:staff|admin')->name('staff.index');
});

require __DIR__.'/auth.php';
