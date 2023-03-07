<?php

namespace App\Http\Livewire\Admin;

use App\Models\Spp;
use Livewire\Component;

class Daspp extends Component
{
    public function render()
    {

        $datas = Spp::all();
        return view('livewire.admin.daspp', compact('datas'));
    }
}
