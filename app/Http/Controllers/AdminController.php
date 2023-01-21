<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function redirectUser() {
        if (Auth::check()) {
            return view('admin.dashboard');
        }
    }

    public function show_dashboard(){
        return view('admin.dashboard');
    }
}
