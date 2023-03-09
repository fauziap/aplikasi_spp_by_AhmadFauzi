<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Entri extends Component
{
    use LivewireAlert;

    public $data;
    protected $listerner = [
        'pemFresh' => '$refresh'
    ];

    public function render()
    {
        $datas = Pembayaran::with('petugas','siswa','spp')->get();
        $petugas = Petugas::all();
        $siswa = Siswa::with('kelas')->get();
        $spp = Spp::all();
        return view('livewire.admin.entri', compact('datas','petugas','siswa','spp'));
    }

    public function simpann()
    {
        $data = $this->data;
        Pembayaran::create([
            'petugas_id' => $data['petugas'],
            'siswa_id' => $data['siswa'],
            'tgl_bayar' => $data['tanggal'],
            'bln_dibayar' => $data['bulan'],
            'thn_dibayar' => $data['tahun'],
            'spp_id' => $data['spp'],
            'jmlh_bayar' => $data['jumlah'],
        ]);
        $this->emit('pemFresh');
        $this->alert('success', 'Berhasil melakukan pembayaran');
        return redirect('entri');
    }
}
