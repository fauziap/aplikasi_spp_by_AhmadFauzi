<?php

use App\Http\Controllers\Auth as Auth;
use App\Http\Livewire\Admin as Adm;
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

Route::middleware(['guest'])->group(function(){
    Route::get('/', [Auth\Authentikasi::class, 'index'])->name('login');
    // Route::post('/', [Auth\Authentikasi::class, 'login']);
});
Route::get('/logout', [Auth\Authentikasi::class, 'logout']);

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

        Route::view('/data-siswa', 'v_admin.dasis')->name('dasis')->middleware('can:level,"admin"');

        Route::view('/data-petugas','v_admin.dape')->name('dape')->middleware('can:level,"admin"');

        Route::view('/data-kelas','v_admin.dake')->name('dake')->middleware('can:level,"admin"');

        Route::view('/data-spp','v_admin.daspp')->name('daspp')->middleware('can:level,"admin"');

        Route::view('/data-entri','v_admin.entri')->name('entri')->middleware('can:level,"admin","petugas"');

        Route::view('/history','v_admin.history')->name('history')->middleware('can:level,"admin","petugas"');

    });
});

Route::get('dasis/export', [Adm\Dasis::class, 'export']);
Route::get('dasis/pdf', [Adm\Dasis::class, 'pdf']);

Route::get('dape/export', [Adm\Dape::class, 'export']);
Route::get('dape/pdf', [Adm\Dape::class, 'pdf']);

Route::get('dake/export', [Adm\Dake::class, 'export']);
Route::get('dake/pdf', [Adm\Dake::class, 'pdf']);

Route::get('spp/export', [Adm\Daspp::class, 'export']);
Route::get('spp/pdf', [Adm\Daspp::class, 'pdf']);

Route::get('entri/export', [Adm\Entri::class, 'export']);
Route::get('entri/pdf', [Adm\Entri::class, 'pdf']);

Route::get('history/export', [Adm\History::class, 'export']);
Route::get('history/pdf', [Adm\History::class, 'pdf']);



