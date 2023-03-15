<?php

namespace App\Http\Livewire\Admin;

use App\Exports\SppExport;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Spp;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Daspp extends Component
{
    use LivewireAlert;

    public $state ;

    protected $listerner = ['sppfress' => '$refresh'];

    public $data, $dataId;

    public function render()
    {
        $datas = Spp::latest()->get();
        return view('livewire.admin.daspp', compact('datas'));
    }

    public function cancel()
    {
        redirect()->route('daspp');
    }

    public function export()
    {
        return Excel::download(new SppExport, 'data-spp.xlsx');
    }

    public function pdf()
    {
        $spp = Spp::latest()->get();
        $pdf = PDF::loadView('tablePdf.daspp', ['datas' => $spp]);
        return $pdf->download('data-spp.pdf');
    }

    public function simpann()
    {
        $data = $this->data;
        if(!isset($data['tahun']) || !isset($data['nominal'])){
            return $this->alert('error', 'Semua WAJIB DIISI');
        }
        $tahun = $data['tahun'];
        $nominal = $data['nominal'];

        $spp = Spp::create([
            'tahun' => $tahun,
            'nominal' => $nominal
        ]);

        $data = '';

        $this->emit('sppfress');
        $this->alert('success', 'Data berhasil dibuat');
        return redirect()->route('/daspp');
    }

    public function showUpdate($dataId)
    {
        $this->state = $dataId;
        if($edit = Spp::find($dataId)){
            if($edit){
                // $this->dataId = $edit->id;
                $dataId = $this->data['id'] = $edit->id;
                $this->data['tahun'] = $edit->tahun;
                $this->data['nominal']= $edit->nominal;
                // return $dataId;
                // dd($this->data);
            }else{
                return redirect()->route('daspp');
            }
        }
        // dd($edit);
        // $this->data['id'] = $edit->id;
        // $this->data['tahun'] = $edit->tahun;
        // $this->data['nominal'] = $edit->nominal;
        // $this->state = $dataId;
        // $dataId = $dataId;

    }

    public function updatee()
    {

        $lal = Spp::where('id',$this->data['id'])->update([
            'tahun' => $this->data['tahun'],
            'nominal' => $this->data['nominal'],
        ]);
        // dd($lal);
        $this->emit('sppfress');
        $this->alert('success', 'Data berhasil diupdate');
        redirect()->route('daspp');

        // return redirect('/daspp')->with($this->alert('success', 'Data berhasil diupdate'));

        // dd($lal);
        // $edit = Spp::find($dataId);
        // dd($edit);
        // $edit->tahun = $this->data['tahun'];
        // $edit->nominal = $this->data['nominal'];

        // $edit->save();
    }

    public function delete($id)
    {
        $data = Spp::find($id);
        $data->delete();
        $this->emit('sppfress');
        $this->alert('success', 'Berhasil menghapus data');

    }


}
