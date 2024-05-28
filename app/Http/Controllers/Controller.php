<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Pemakaian;
use App\Models\User;


use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard() {
        if (auth()->user()->hasRole("admin")) {
            $username = auth()->user()->name;
            $barang_latest = Barang::latest()->paginate(1);
            $pembelian_latest = Pembelian::join("barangs","pembelians.id_barang","=","barangs.id_barang")->select("barangs.nama_barang","pembelians.jumlah","pembelians.created_at")->latest()->paginate(1);
            $pemakaian_latest = Pemakaian::latest()->paginate(1);
            $barang = Barang::all();
            $pembelian = Pembelian::all();
            $pemakaian = Pemakaian::all();
            $user = User::all();
            $user_latest = User::latest()->paginate(1);
            return view('layouts.admin.index', compact('username', 'barang', 'pembelian', 'pemakaian', 'barang_latest', 'pembelian_latest', 'pemakaian_latest', 'user', 'user_latest'));
        }
        else {
            return view('layouts.user.index');
        }
    }
}

