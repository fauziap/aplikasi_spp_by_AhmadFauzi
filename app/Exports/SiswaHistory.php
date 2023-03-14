<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaHistory implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $id = Auth::user()->id;
        return Pembayaran::where('siswa_id',$id)->latest()->get();
    }
}
