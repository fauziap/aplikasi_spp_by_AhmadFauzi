<?php

namespace App\Http\Controllers\tablePdf;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DapeController extends Controller
{
    public function index()
    {
        $datas = Petugas::latest()->get();
        return view('tablePdf.dape', compact('datas'));
    }
}
