<?php

namespace App\Http\Livewire\Admin;

use App\Models\Petugas;
use Livewire\Component;

class Dape extends Component
{
    public function render()
    {
        $datas = Petugas::all();
        return view('livewire.admin.dape', compact('datas'));
    }
}
