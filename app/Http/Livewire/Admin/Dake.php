<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use Livewire\Component;

class Dake extends Component
{
    public function render()
    {
        $datas = Kelas::all();
        return view('livewire.admin.dake', compact('datas'));
    }
}
