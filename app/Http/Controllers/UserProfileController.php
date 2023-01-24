<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    //
    public function showInfo() {
        dd(Auth::user()->id);
        return ;
    }
}
