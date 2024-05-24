<?php

namespace App\Http\Controllers;
use App\Models\Pemakaian;
use Illuminate\Http\Request;

class PemakaianController extends Controller
{
    public function index() {
        $pemakaian = Pemakaian::latest()->paginate(10);
        return view("pemakaian.index", compact("pemakaian"));
    }
}
