<?php

use App\Http\Controllers\Auth as Auth;
use App\Http\Livewire\Admin\Dake;
use App\Http\Livewire\Admin\Dape;
use App\Http\Livewire\Admin\Dasis;
use App\Http\Livewire\Admin\Daspp;
use App\Http\Livewire\Admin\Entri;
use App\Http\Livewire\Admin\History;
use App\Http\Livewire\Siswa\History as SiswaHistory;
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

Route::get('/', [Auth\Authentikasi::class, 'index'])->name('login');
Route::post('/', [Auth\Authentikasi::class, 'login']);
Route::get('/logout', [Auth\Authentikasi::class, 'logout']);

// Route::middleware(['auth', 'siswa'])->group(function (){
//     Route::view('siswa', 'v_siswa.history');
// });

// Route::prefix('siswa')->middleware('auth:siswa')->group(function () {


// });
Route::group([
    'prefix' => config('siswa.prefix'),
    'namespace' => 'App\\Http\\Controllers',
], function(){
    Route::middleware(['auth:siswa'])->group(function () {
        Route::view('/', 'v_siswa.historys')->name('siswa');
        Route::get('/export', [SiswaHistory::class, 'export'])->name('SiswaExport');
        Route::get('/pdf', [SiswaHistory::class, 'pdf'])->name('SiswaPdf');
    });
});

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => 'App\\Http\\Controllers',
], function () {

    Route::middleware(['auth:petugas'])->group(function () {
        Route::view('/', 'v_admin.dashboard')->name('dashboard');

        Route::view('/dasis', 'v_admin.dasis')->name('dasis')->middleware('can:level,"admin"');

        Route::view('/dape','v_admin.dape')->name('dape')->middleware('can:level,"admin"');

        Route::view('/dake','v_admin.dake')->name('dake')->middleware('can:level,"admin"');

        Route::view('/daspp','v_admin.daspp')->name('daspp')->middleware('can:level,"admin"');

        Route::view('/entri','v_admin.entri')->name('entri')->middleware('can:level,"admin","petugas"');

        Route::view('/history','v_admin.history')->name('history')->middleware('can:level,"admin","petugas"');

    });
});

Route::get('dasis/export', [Dasis::class, 'export']);
Route::get('dasis/pdf', [Dasis::class, 'pdf']);

Route::get('dape/export', [Dape::class, 'export']);
Route::get('dape/pdf', [Dape::class, 'pdf']);

Route::get('dake/export', [Dake::class, 'export']);
Route::get('dake/pdf', [Dake::class, 'pdf']);

Route::get('spp/export', [Daspp::class, 'export']);
Route::get('spp/pdf', [Daspp::class, 'pdf']);

Route::get('entri/export', [Entri::class, 'export']);
Route::get('entri/pdf', [Entri::class, 'pdf']);

Route::get('history/export', [History::class, 'export']);
Route::get('history/pdf', [History::class, 'pdf']);



// admin
// Route::get('/dashboard', function () {
//     return view('v_admin.dashboard');
// })->middleware('can:level,"admin"');
// Route::get('/dasis', function () {
//     return view('v_admin.dasis');
// });
// Route::get('dasis/export', [Dasis::class, 'export']);
// Route::get('dasis/pdf', [Dasis::class, 'pdf']);


// Route::get('/dape', function () {
//     return view('v_admin.dape');
// });
// Route::get('dape/export', [Dape::class, 'export']);
// Route::get('dape/pdf', [Dape::class, 'pdf']);


// Route::get('/dake', function () {
//     return view('v_admin.dake');
// });
// Route::get('dake/export', [Dake::class, 'export']);
// Route::get('dake/pdf', [Dake::class, 'pdf']);



// Route::get('/daspp', function () {
//     return view('v_admin.daspp');
// });
// Route::get('spp/export',[Daspp::class,'export']);
// Route::get('spp/pdf',[Daspp::class,'pdf']);

// Route::get('/entri', function () {
//     return view('v_admin.entri');
// });
// Route::get('entri/export', [Entri::class, 'export']);
// Route::get('entri/pdf', [Entri::class, 'pdf']);


// Route::get('/history', function () {
//     return view('v_admin.history');
// });
// Route::get('history/export', [History::class, 'export']);
// Route::get('history/pdf', [History::class, 'pdf']);

// // Petugas
// // Route::get('/dashboard', function(){
// //     return view('v_petugas.dashboard');
// // })->middleware('can:level,"petugas"');
// Route::get('/petugas/entri', function(){
//     return view('v_petugas.entrip');
// });
// Route::get('/petugas/history', function(){
//     return view('v_petugas.historyp');
// });


// Siswa
// Route::get('/siswa', function(){
//     return view('v_siswa.historys');
// });


// Route::get('lala',[]);



