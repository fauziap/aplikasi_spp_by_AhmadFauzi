<?php

namespace App\Http\Livewire\Auth;
use Illuminate\Support\Facades\Auth;
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

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->intended('/dashboard');
        }

        if(Auth::guard('petugas')->attempt(['username'=>$username, 'password'=>$password])){
            return redirect()->intended('/dashboard');
        }
        return $this->alert('error', 'Username atau Password salah');

        // if(Auth::guard('siswa')->attempt(['username' => $username, 'password' => $password])) {
        //     return redirect()->intended('/sis');
        // }elseif (Auth::guard('petugas')->attempt(['username' => $username, 'password' => $password])) {
        //     if(Auth::user()->level=='admin'){
        //         return redirect()->intended('/adm');
        //     }
        //     return redirect('/pet');
        // }else{
        //     return $this->alert('error', 'Username atau Password salah');
        // }

    }
}
