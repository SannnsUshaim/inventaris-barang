<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard() {
        if (auth()->user()->hasRole("admin")) {
            $username = auth()->user()->name;
            return view('layouts.admin.index', compact('username'));
        }
        else {
            return view('layouts.user.index');
        }
    }
}

