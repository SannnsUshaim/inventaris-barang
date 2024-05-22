<?php

namespace App\Http\Controllers;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index() {
        $pembelian = Pembelian::latest()->paginate(10);
        return view("pembelian.index", compact("pembelian"));
    }
}
