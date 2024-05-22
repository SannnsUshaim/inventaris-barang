<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembelianController;    
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
    Route::get('barang/{id}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::patch('barang/{id}/update', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('barang/{id}/delete', [BarangController::class, 'delete'])->name('barang.delete');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
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
