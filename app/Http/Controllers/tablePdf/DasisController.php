<?php

namespace App\Http\Controllers\tablePdf;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DasisController extends Controller
{
    public function __construct()
    {
        $dat = Siswa::latest()->get();
        // dd($dat);
        return view('tablePdf.dasis', compact('dat'));
    }
}
