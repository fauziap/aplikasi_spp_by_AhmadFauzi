<?php

namespace App\Http\Livewire\Admin;

use App\Exports\KelasExport;
use App\Models\Kelas;
use Barryvdh\DomPDF\Facade\Pdf;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Dake extends Component
{
    use LivewireAlert;

    protected $listerner = [
        'kelasFresh' => '$refresh',
    ];

    public $state;
    public $data, $dataId;

    public function render()
    {
        $datas = Kelas::latest()->get();
        return view('livewire.admin.dake', compact('datas'));
    }

    public function export()
    {
        return Excel::download(new KelasExport, 'data-kelas.xlsx');
    }

    public function pdf()
    {
        $kelas = Kelas::latest()->get();
        $pdf = Pdf::loadView('livewire.admin.dake', ['state' => 0, 'datas' => $kelas]);
        return $pdf->download('data-kelas.pdf');
    }

    public function cancel()
    {
        return redirect('dake');
    }

    public function simpann()
    {
        $data = $this->data;
        if(!isset($data['kelas']) || !isset($data['jurusan'])){
            return $this->alert('error', 'semua WAJIB DIISI');
        }

        $kelas = $data['kelas'];
        $jurusan = $data['jurusan'];

        $data = Kelas::create([
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);

        $data = '';
        $this->emit('kelasFresh');
        $this->alert('success', 'Berhasil buat kelas');
        return redirect('dake');
    }

    public function showUpdate($dataId)
    {
        $this->state = $dataId;
        if($edit = Kelas::find($dataId)){
            $this->data['id'] = $edit->id;
            $this->data['kelas'] = $edit->kelas;
            $this->data['jurusan'] = $edit->jurusan;
        }else{
            return redirect('dake');
        }
    }

    public function updatee()
    {
        $data = Kelas::where('id', $this->data['id'])->update([
            'kelas' => $this->data['kelas'],
            'jurusan' => $this->data['jurusan']
        ]);

        $this->emit('kelasFresh');
        $this->alert('success', 'Berhasil update kelas');
        return redirect('dake');

    }

    public function delete($id)
    {
        $data = Kelas::find($id);
        $data->delete();
        $this->emit('kelasFresh');
        $this->alert('success', 'Berhasil menghapus data');
    }
}
