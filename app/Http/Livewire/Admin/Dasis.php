<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Dasis extends Component
{

    use LivewireAlert;
    protected $listerner = [
        'sisFresh' => '$refresh'
    ];

    public $state;
    public $data, $dataId;

    public function render()
    {

        $datas = Siswa::with('kelas','spp')->get();
        $spp = Spp::all();
        $kelas = Kelas::all();
        // dd($datas);
        return view('livewire.admin.dasis', compact('datas', 'spp', 'kelas') );
    }

    public function cancel()
    {
        return redirect('dasis');
    }

    public function simpann()
    {
        $data = $this->data;
        // dd($data);
        $nama = $data['nama'];
        $kelas = $data['kelas'];
        $username = $data['username'];
        $password = Hash::make($data['password']);
        $nisn = $data['nisn'];
        $nis = $data['nis'];
        $alamat = $data['alamat'];
        $no_tlp = $data['no_tlp'];
        $spp = $data['spp'];

        Siswa::create([
            'nama' => $nama,
            'kelas_id' => $kelas,
            'username' => $username,
            'password' => $password,
            'nisn' => $nisn,
            'nis' => $nis,
            'alamat' => $alamat,
            'no_telp' => $no_tlp,
            'spp_id' => $spp
        ]);

        $this->emit('sisFresh');
        $this->alert('success','Berhasil buat siswa');
        redirect('dasis');
    }

    public function showUpdate($dataId)
    {
        $this->state = $dataId;
        if($edit = Siswa::find($dataId)){
            // dd($data);
            if($edit){
                $this->data['id'] = $edit->id;
                $this->data['nama'] = $edit->nama;
                $this->data['kelas'] = $edit->kelas->id;
                $this->data['username'] = $edit->username;
                $this->data['nisn'] = $edit->nisn;
                $this->data['alamat'] = $edit->alamat;
                $this->data['nis'] = $edit->nis;
                $this->data['no_tlp'] = $edit->no_telp;
                $this->data['spp'] = $edit->spp->id;
            } else {
                return redirect('dasis');
            }
        }
    }

    public function updatee()
    {
        Siswa::where('id', $this->data['id'])->update([
            'nama' => $this->data['nama'],
            'kelas_id' => $this->data['kelas'],
            'username' => $this->data['username'],
            'nisn' => $this->data['nisn'],
            'alamat' => $this->data['alamat'],
            'nis' => $this->data['nis'],
            'no_telp' => $this->data['no_tlp'],
            'spp_id' => $this->data['spp'],
        ]);
        $this->emit('sisFresh');
        $this->alert('success', 'Berhasil update data');
        return redirect('dasis');
    }

    public function deletee($id)
    {
        $data = Siswa::find($id);
        $data->delete();
        $this->emit('sisFresh');
        $this->alert('success','Berhasil hapus data');
    }
}
