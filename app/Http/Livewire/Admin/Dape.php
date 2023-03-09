<?php

namespace App\Http\Livewire\Admin;

use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Dape extends Component
{
    use LivewireAlert;

    protected $listerner = [
        'petFresh' => '$refresh',
    ];
    public $data;
    public $state;

    public function render()
    {
        $datas = Petugas::all();
        return view('livewire.admin.dape', compact('datas'));
    }

    public function cancel()
    {
        return redirect('dape');
    }

    public function simpann()
    {
        $data = $this->data;
        // dd($data);
        if(!isset($data['nama']) || !isset($data['username']) || !isset($data['password']) || !isset($data['level']))
        {
            return $this->alert('error', 'semua WAJIB DIISI');
        }

        $data = Petugas::create([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'level' => $data['level'],
        ]);

        $data = '';
        $this->alert('success', 'Berhasil membuat petugas');
        $this->emit('petFresh');
        return redirect('dape');

    }

    public function showUpdate($id)
    {
        $this->state = $id;
        if($data = Petugas::find($id)){
            $this->data['id'] = $data->id;
            $this->data['nama'] = $data->nama;
            $this->data['username'] = $data->username;
            $this->data['level'] = $data->level;
        }else{
            return redirect('dape');
        }
    }

    public function updatee()
    {
        Petugas::where('id',$this->data['id'])->update([
            'nama' => $this->data['nama'],
            'username' => $this->data['username'],
            'level' => $this->data['level']
        ]);
        $this->alert('success', 'Berhasil edit data');
        $this->emit('petFresh');
        redirect('dape');

    }

    public function deletee($id)
    {
        $data = Petugas::find($id);
        $data->delete();
        $this->alert('success', 'Berhasil hapus data');
        return redirect('dape');
    }
}
