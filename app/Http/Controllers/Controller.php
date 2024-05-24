<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Pemakaian;


use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard() {
        if (auth()->user()->hasRole("admin")) {
            $username = auth()->user()->name;
            $barang = Barang::all();
            $pembelian = Pembelian::all();
            $pemakaian = Pemakaian::all();
            return view('layouts.admin.index', compact('username', 'barang', 'pembelian', 'pemakaian'));
        }
        else {
            return view('layouts.user.index');
        }
    }
}

