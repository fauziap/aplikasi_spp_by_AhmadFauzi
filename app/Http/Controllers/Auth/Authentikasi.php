<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Authentikasi extends Controller
{
    use LivewireAlert;

    public function index()
    {
        return view('login');
    }

    public function setUserSession($user)
    {
        session(['user' => $user]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // dd($credentials);
        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $this->setUserSession($user);
            return redirect()->intended('siswa');
        } elseif (Auth::guard('petugas')->attempt($credentials, $request->remember)) {
            $user = Auth::user();
            $this->setUserSession($user);
            $request->session()->regenerate();
            return redirect()->intended(config('petugas.prefix'));
        }
        return $this->alert('error', 'Username atau Password salah');
        // elseif (Auth::guard('petugas')->attempt($credentials, $request->remember)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended(config('petugas.prefix'));
        // }
        // else (Auth::guard('petugas')->attempt($credentials, $request->remember)) {
        //     // $request->session()->regenerate();
        //     return redirect()->intended(config('petugas.prefix'))
    }

    public function logout(Request $request)
    {

        Auth::guard('siswa')->logout();
        Auth::guard('petugas')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
