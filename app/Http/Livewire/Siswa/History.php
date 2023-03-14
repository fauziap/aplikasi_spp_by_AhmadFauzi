<?php

namespace App\Http\Livewire\Siswa;

use App\Exports\SiswaHistory;
use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class History extends Component
{
    public function render()
    {
        $id = Auth::user()->id;
        // dd($id);
        $datas = Pembayaran::where('siswa_id', $id)->latest()->get();
        // dd($datas);
        return view('livewire.siswa.history', compact('datas'));
    }
    public function export()
    {
        return Excel::download(new SiswaHistory, 'data-history-'. Auth::user()->nama .'.xlsx');
    }

    public function pdf()
    {
        $id = Auth::user()->id;
        $pembayaran = Pembayaran::where('siswa_id', $id)->latest()->get();
        $pdf = Pdf::loadView('livewire.siswa.history', ['datas' => $pembayaran]);
        return $pdf->download('data-pembayaran-'. Auth::user()->nama .'.pdf');
    }
}
