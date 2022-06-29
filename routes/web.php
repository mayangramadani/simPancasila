<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\DatatransaksiController;




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

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/datakeuangan', function () {
        return view('datakeuangan');
    });
    Route::get('/datalaporan/laporansemester', function () {
        return view('datalaporan.laporansemester');
    });
    Route::get('/datalaporan/laporantahunan', function () {
        return view('datalaporan.laporantahunan');
    });
    Route::get('/histori', function () {
        return view('histori');
    });
    Route::get('/tagihansiswa', function () {
        return view('tagihansiswa');
    });
    Route::get('/informasisekolah', function () {
        return view('informasisekolah');
    });
    Route::get('/transaksi/datatransaksi', function () {
        return view('/transaksi/datatransaksi');
    });



    // pembayaran
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/{id}', [TransaksiController::class, 'transaksi'])->name('detailtransaksi');
    Route::get('/transaksi/{id}/tampilkan', [TransaksiController::class, 'tampilkan'])->name('tampilkan');
    Route::get('/transaksi/konfirmasi', [KonfirmasiController::class, 'index'])->name('konfirmasi');


    // datasiswa
    Route::get('/datasiswa', [DataSiswaController::class, 'index'])->name('datasiswa');
    Route::get('/data-siswa/{id}', [DataSiswaController::class, 'getsiswa'])->name('getsiswa');
    Route::get('/datasiswa/create', [DataSiswaController::class, 'create'])->name('create');
    Route::post('/datasiswa/add', [DataSiswaController::class, 'store']);
    Route::delete('/datasiswa/{id}', [DataSiswaController::class, 'hapus']);
    Route::put('/datasiswa/{id}', [DataSiswaController::class, 'update']);
    Route::get('/datasiswa/{id}/edit', [DataSiswaController::class, 'edit']);
    Route::get('/datasiswa/{id}/detail', [DataSiswaController::class, 'detail']);

    // datakelas
    Route::get('/datakelas', [DataKelasController::class, 'index'])->name('datakelas');
    Route::post('/datakelas/add', [DataKelasController::class, 'add']);
    Route::delete('/datakelas/{id}', [DataKelasController::class, 'hapus']);
    Route::put('/datakelas/{id}', [DataKelasController::class, 'update']);
    Route::get('/datakelas/{id}/edit', [DataKelasController::class, 'edit']);

    // datakeuangan
    Route::get('/datakeuangan', [KeuanganController::class, 'index'])->name('index');
    Route::get('/datakeuangan/create', [KeuanganController::class, 'create'])->name('create');
    Route::post('/datakeuangan/add', [KeuanganController::class, 'add'])->name('add');
    Route::get('/datakeuangan/{id}/detail', [KeuanganController::class, 'detail'])->name('detail');
    Route::get('/datakeuangan/{id}/edit', [KeuanganController::class, 'edit']);
    Route::delete('/datakeuangan/{id}', [KeuanganController::class, 'hapus']);
    Route::put('/datakeuangan/{id}', [KeuanganController::class, 'update']);
    Route::get('/datakeuangan/{id}', [KeuanganController::class, 'getkeuangan'])->name('getkeuangan');

    // spp
    Route::get('/transaksi/datatransaksi', [DatatransaksiController::class, 'getIndex'])->name('transaksi');
});

require __DIR__ . '/auth.php';
