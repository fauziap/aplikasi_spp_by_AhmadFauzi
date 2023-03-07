<?php

use App\Http\Controllers\Auth as Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Auth\Authentikasi::class, 'index']);
Route::post('/log', [Auth\Authentikasi::class, 'login']);
Route::get('/logout', [Auth\Authentikasi::class, 'logout']);

Route::group(['middleware' => ['auth:siswa,pengguna']], function(){

});

// admin
Route::get('/dashboard', function () {
    return view('v_admin.dashboard');
});
Route::get('/dasis', function () {
    return view('v_admin.dasis');
});
Route::get('/dape', function () {
    return view('v_admin.dape');
});
Route::get('/dake', function () {
    return view('v_admin.dake');
});
Route::get('/daspp', function () {
    return view('v_admin.daspp');
});
Route::get('/entri', function () {
    return view('v_admin.entri');
});
Route::get('/history', function () {
    return view('v_admin.history');
});

// Petugas
Route::get('/petugas', function(){
    return view('v_petugas.dashboard');
});
Route::get('/petugas/entri', function(){
    return view('v_petugas.entrip');
});
Route::get('/petugas/history', function(){
    return view('v_petugas.historyp');
});


// Siswa
Route::get('/siswa', function(){
    return view('v_siswa.historys');
});





