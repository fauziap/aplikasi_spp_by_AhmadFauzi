<?php

namespace App\Http\Livewire\Admin;
use App\Models\Siswa;

use Livewire\Component;

class Dasis extends Component
{
    public function render()
    {

        $datas = Siswa::with('kelas','spp')->get();
        // dd($datas);
        return view('livewire.admin.dasis', compact('datas') );
    }
}
