<?php

namespace App\Http\Livewire\Admin;

use App\Exports\PetugasExport;
use App\Models\Petugas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Dape extends Component
{
    use LivewireAlert;

    protected $listerner = [
        'petFresh' => '$refresh',
    ];
    public $data;
    public $username;
    public $state;

    public function render()
    {
        $datas = Petugas::latest()->get();
        return view('livewire.admin.dape', compact('datas'));
    }
    public function export()
    {
        return Excel::download(new PetugasExport, 'data-petugas.xlsx');
    }

    public function pdf()
    {
        $petugas = Petugas::latest()->get();
        $pdf = Pdf::loadView('tablePdf.dape', ['datas' => $petugas]);
        return $pdf->download('data-petugas.pdf');
    }

    public function cancel()
    {
        return redirect()->route('dape');
    }

    public function simpann()
    {
        $data = $this->data;
        $this->username = $data['username'];
        $this->validate([
            'username' => [
                'required',
                'unique:m_petugas,username'
            ],
        ], [
            'username.unique' => 'Username sudah digunakan coba yang lain'
        ]);
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
        return redirect()->route('dape');

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
            return redirect()->route('dape');
        }
    }

    public function updatee()
    {
        $data = $this->data;
        $this->username = $data['username'];
        $this->validate([
            'username' => [
                'required',
                'unique:m_petugas,username'
            ],
        ], [
            'username.unique' => 'Username sudah digunakan coba yang lain'
        ]);
        Petugas::where('id',$this->data['id'])->update([
            'nama' => $this->data['nama'],
            'username' => $this->data['username'],
            'level' => $this->data['level']
        ]);
        $this->alert('success', 'Berhasil edit data');
        $this->emit('petFresh');
        redirect()->route('dape');

    }

    public function deletee($id)
    {
        $data = Petugas::find($id);
        $data->delete();
        $this->alert('success', 'Berhasil hapus data');
        $this->emit('petFresh');
    }
}
