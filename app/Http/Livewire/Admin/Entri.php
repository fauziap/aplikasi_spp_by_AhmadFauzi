<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pembayaran;
use Livewire\Component;

class Entri extends Component
{
    public function render()
    {
        $datas = Pembayaran::with('petugas','siswa','spp')->get();
        return view('livewire.admin.entri', compact('datas'));
    }
}
