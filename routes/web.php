<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\DatatransaksiController;
use App\Http\Controllers\KategoriPembayaranController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\AksesKelasController;
use App\Http\Controllers\SaldoController;



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
    return view('index');
});
// Route::get('/', function () {
//     return redirect()->route('login');
// });


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



    // Landing Page


    // pembayaran
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::post('/import-siswa', [DataSiswaController::class, 'importSiswa'])->name('importSiswa');
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

    // Kategori Pembayaran
    Route::get('/kategoripembayaran', [KategoriPembayaranController::class, 'index'])->name('datakelas');
    Route::post('/kategoripembayaran/add', [KategoriPembayaranController::class, 'add']);
    Route::delete('/kategoripembayaran/{id}', [KategoriPembayaranController::class, 'hapus']);
    Route::put('/kategoripembayaran/{id}', [KategoriPembayaranController::class, 'update']);
    Route::get('/kategoripembayaran/{id}/edit', [KategoriPembayaranController::class, 'edit']);

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

    // sekolah
    Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah');
    Route::post('/sekolah/add', [SekolahController::class, 'add']);
    Route::delete('/sekolah/{id}', [SekolahController::class, 'hapus']);
    Route::put('/sekolah/{id}', [SekolahController::class, 'update']);
    Route::get('/sekolah/{id}/edit', [SekolahController::class, 'edit']);

    // akseskelas
    Route::get('/akseskelas', [AksesKelasController::class, 'index'])->name('akseskelas');
    Route::post('/akseskelas/add', [AksesKelasController::class, 'add']);
    Route::delete('/akseskelas/{id}', [AksesKelasController::class, 'hapus']);
    Route::put('/akseskelas/{id}', [AksesKelasController::class, 'update']);
    Route::get('/akseskelas/{id}/edit', [AksesKelasController::class, 'edit']);

    // saldo
    Route::get('/saldo', [SaldoController::class, 'index'])->name('saldo');
    Route::post('/saldo/add', [SaldoController::class, 'add']);
    Route::delete('/saldo/{id}', [SaldoController::class, 'hapus']);
    Route::put('/saldo/{id}', [SaldoController::class, 'update']);
    Route::get('/saldo/{id}/edit', [SaldoController::class, 'edit']);
});

require __DIR__ . '/auth.php';
