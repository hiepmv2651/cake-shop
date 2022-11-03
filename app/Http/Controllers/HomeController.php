<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1' || $usertype == '2') {
            return view('admin.home');
        } else {
            return view('admin.home');
        }
    }
}


