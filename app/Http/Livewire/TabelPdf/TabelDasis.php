<?php

namespace App\Http\Livewire\TabelPdf;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Livewire\Component;

class TabelDasis extends Component
{
    public function render()
    {
        $datas = Siswa::latest()->with('kelas', 'spp')->get();
        $spp = Spp::all();
        $kelas = Kelas::all();
        dd($datas);
        return view('livewire.tabel-pdf.tabel-dasis',compact(['datas','spp','kelas']));
    }
}
