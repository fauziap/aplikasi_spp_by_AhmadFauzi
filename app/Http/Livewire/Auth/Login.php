<?php

namespace App\Http\Livewire\Auth;

use App\Models\Petugas;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $username = $data['username'];
        $password = $data['password'];

        // if (Auth::guard('siswa')->attempt(['username' => $username, 'password' => $password])) {
        //     return redirect()->intended('/siswa')->with($this->alert('success', 'Berhasil login'));
        // }elseif (Auth::guard('petugas')->attempt(['username' => $username, 'password' => $password])) {
        //     // $request->session()->regenerate();
        //     return redirect()->intended(config('petugas.prefix'));
        // }

        if (Auth::guard('siswa')->attempt(['username' => $username, 'password' => $password])) {
            // $request->session()->regenerate();
            $user = Auth::user();
            $this->setUserSession($user);
            return redirect()->intended('siswa');
        } elseif (Auth::guard('petugas')->attempt($simpan = ['username' => $username, 'password' => $password])) {
            $user = Auth::user();
            $this->setUserSession($user);
            // $this->data->session()->regenerate();
            return redirect()->intended(config('petugas.prefix'));
        }
        return $this->alert('error', 'Login gagal');



        // try {
        //     $login = Petugas::where([
        //         'username' => $username,
        //         'password' => md5($password),
        //     ])->firstOrFail();

        //     Auth::guard('petugas')->login($login);

        //     if($login->level == 0){
        //         return redirect('dashboard');
        //     } elseif($login == 1){
        //         return redirect('petugas');
        //     }
        // } catch (ModelNotFoundException $ex) {
        //     return back()->with('error', 'Your account not found, please check username or password');
        // } catch (\Throwable $th) {
        //     return back()->with('error', 'Maaf, terjadi kesalahan dalam proses login');
        // }

        // return $this->alert('error', 'Login gagal');


            // $user = $this->data = DB::table('m_petugas')->get();

            //     dd($user);
                // if (in_array(Auth::user()->level=='0'))
                // {
                //     // dd($lala);
                //     return redirect('dashboard');
                // }elseif(in_array($user->level, ['1']))
                // {
                //     return redirect('petugas');
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
        // if (Auth::guard('siswa')->attempt(['username' => $username, 'password' => $password])) {
        //     $this->alert('success', 'Berhasil login');
        //     return redirect('/sis');
        // } elseif (Auth::guard('petugas')->attempt(['username' => $username, 'password' => $password])) {
        //     if ($data = Auth::check() && Auth::petugas()->level == 'admin') {
        //         $this->alert('success', 'Berhasil login');
        //         return redirect('/dashboard');
        //     } else {
        //         // dd($data);
        //         $this->alert('success', 'Berhasil login');
        //         return redirect('dashboard');
        //     }
        // } else {
        //     return $this->alert('error', 'Username atau Password salah');
        // }
    }
    public function setUserSession($user)
    {
        session(['user' => $user]);
    }
}
