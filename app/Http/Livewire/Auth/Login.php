<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;



class Login extends Component
{
    use LivewireAlert;

    public $data;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function submit()
    {
        $data = $this->data;
        if (!isset($data['username']) || !isset($data['password'])) {
            return $this->alert('error', 'Tolong isi Username dan Password');
        }

        $password = $data['password'];
        $username = $data['username'];

        // if (Auth::guard('siswa')->attempt(['username' => $username, 'password' => $password])) {
        //     return redirect()->intended('/siswa')->with($this->alert('success', 'Berhasil login'));
        // }

        // if (Auth::guard('petugas')->attempt(['username' => $username, 'password' => $password])) {
        //     if (Auth::check() && Auth::user()->level == 'admin') {
        //         $this->alert('success', 'Berhasil login');
        //         return redirect()->intended('/dashboard');
        //     } else {
        //         $this->alert('success', 'Berhasil login');
        //         return redirect('/petugas');
        //     }
        //     return $this->alert('error', 'Username atau Password salah');
        // }
        if (Auth::guard('siswa')->attempt(['username' => $username, 'password' => $password])) {
            $this->alert('success', 'Berhasil login');
            return redirect('/sis');
        } elseif (Auth::guard('petugas')->attempt(['username' => $username, 'password' => $password])) {
            if (Auth::check() && Auth::user()->level == 'admin') {
                $this->alert('success', 'Berhasil login');
                return redirect('/dashboard');
            } else {
                $this->alert('success', 'Berhasil login');
                return redirect('/pet');
            }
        } else {
            return $this->alert('error', 'Username atau Password salah');
        }
    }
}
