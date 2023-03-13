<?php

namespace App\Http\Controllers\sidebar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class admin extends Controller
{
    public function dashboard()
    {
        $user = session('user');
        dd($user);
        return view('layouts.sidebar.admin', compact('user'));
    }
}
