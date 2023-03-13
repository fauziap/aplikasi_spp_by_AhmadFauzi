<?php

namespace App\Http\Livewire\Admin;

use App\Exports\PembayaranExport;
use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class History extends Component
{
    public function render()
    {
        $datas = Pembayaran::latest()->get();
        return view('livewire.admin.history', compact('datas'));
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
        $pdf = Pdf::loadView('livewire.admin.history', ['datas' => $entri, 'state' => 0, 'petugas' => $petugas, 'siswa' => $siswa, 'spp' => $spp]);
        return $pdf->download('data-history.pdf');
    }
}
