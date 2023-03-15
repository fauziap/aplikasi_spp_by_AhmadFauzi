<?php

namespace App\Http\Livewire\Admin;

use App\Exports\PembayaranExport;
use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Entri extends Component
{
    use LivewireAlert;

    public $state;
    public $data,$dataId;
    protected $listerner = [
        'pemFresh' => '$refresh'
    ];

    public function render()
    {
        $datas = Pembayaran::latest()->with('petugas','siswa','spp')->get();
        $petugas = Petugas::all();
        $siswa = Siswa::with('kelas')->get();
        $spp = Spp::all();
        return view('livewire.admin.entri', compact('datas','petugas','siswa','spp'));
    }

    public function export()
    {
        return Excel::download(new PembayaranExport, 'data-pembayaran.xlsx');
    }

    public function pdf()
    {
        $spp = Spp::latest()->get();
        $siswa = Siswa::with('kelas')->get();
        $petugas = Petugas::latest()->get();
        $entri = Pembayaran::latest()->get();
        $pdf = PDF::loadView('tablePdf.entri', ['datas' => $entri, 'petugas' => $petugas, 'siswa' => $siswa, 'spp' => $spp]);
        return $pdf->download('data-entri.pdf');
    }

    public function cancel(){
        return redirect()->route('entri');
    }

    public function simpann()
    {
        DB::beginTransaction();
        try{
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
            DB::commit();
            $this->emit('pemFresh');
            $this->alert('success', 'Berhasil melakukan pembayaran');
        } catch (\Exception) {
            DB::rollBack();
            $this->alert('error', 'Terjadi kesalahan. Data tidak berhasil');
        }
        return redirect()->route('entri');
    }

    public function showUpdate($dataId)
    {
        $this->state = $dataId;
        if($edit = Pembayaran::find($dataId)){
            if($edit){
                $this->data['id'] = $edit->id;
                $this->data['petugas'] = $edit->petugas->id;
                $this->data['siswa'] = $edit->siswa->id;
                $this->data['tanggal'] = $edit->tgl_bayar;
                $this->data['bulan'] = $edit->bln_dibayar;
                $this->data['tahun'] = $edit->thn_dibayar;
                $this->data['spp'] = $edit->spp->id;
                $this->data['jumlah'] = $edit->jmlh_bayar;
            }
        }
    }

    public function updatee()
    {
        DB::beginTransaction();
        try{
            Pembayaran::where('id', $this->data['id'])->update([
                'petugas_id' => $this->data['petugas'],
                'siswa_id' => $this->data['siswa'],
                'tgl_bayar' => $this->data['tanggal'],
                'bln_dibayar' => $this->data['bulan'],
                'thn_dibayar' => $this->data['tahun'],
                'spp_id' => $this->data['spp'],
                'jmlh_bayar' => $this->data['jumlah']
            ]);
            DB::commit();
            $this->emit('pemFresh');
            $this->alert('success','Berhasil update pembayaran');
        } catch (\Exception){
            DB::rollBack();
            $this->alert('error', 'Terjadi kesalahan. Update pembayaran gagal');
        }
        redirect()->route('entri');
    }

    public function delete($id)
    {
        $data = Pembayaran::find($id);
        $data->delete();
        $this->alert('success','Berhasil menghapus pembayaran');
        $this->emit('pemFresh');
    }
}
