<?php

namespace App\Http\Livewire\Admin;

use App\Exports\SiswaExport;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Dasis extends Component
{

    use LivewireAlert;
    protected $listerner = [
        'sisFresh' => '$refresh'
    ];

    public $state;
    public $data, $dataId;
    public $username;


    public function render()
    {

        $datas = Siswa::latest()->with('kelas','spp')->get();
        $sppp = Spp::all();
        $kelass = Kelas::all();
        // dd($datas);
        return view('livewire.admin.dasis', compact('datas', 'sppp', 'kelass') );
    }

    public function export()
    {
        return Excel::download(new SiswaExport, 'data-siswa.xlsx');
    }

    public function pdf()
    {
        $spp = Spp::latest()->get();
        $siswa = Siswa::with('kelas')->get();
        $kelas = Kelas::latest()->get();
        $pdf = Pdf::loadView('livewire.admin.dasis', ['state' => 0, 'datas' => $siswa, 'spp' => $spp, 'kelas' => $kelas]);
        return $pdf->download('data-siswa.pdf');
    }

    public function cancel()
    {
        return redirect()->route('dasis');
    }

    public function simpann()
    {
        $data = $this->data;
        $this->username = $data['username'];
        $this->validate([
            'username' => [
                'required',
                'unique:m_siswa,username'
            ],
        ], [
            'username.unique' => 'Username sudah digunakan coba yang lain',
        ]);
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
        redirect()->route('dasis');
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
                return redirect()->route('dasis');
            }
        }
    }

    public function updatee()
    {
        $data = $this->data;
        $this->username = $data['username'];
        $this->validate([
            'username' => [
                'required',
                'unique:m_siswa,username'
            ],
        ],[
            'username.unique' => 'Username sudah digunakan coba yang lain'
        ]);
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
        return redirect()->route('dasis');
    }

    public function deletee($id)
    {
        $data = Siswa::find($id);
        $data->delete();
        $this->emit('sisFresh');
        $this->alert('success','Berhasil hapus data');
    }
}
