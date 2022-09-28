<?php

use App\Http\Controllers\ActivityLogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\TransaksiSiswaController;
use App\Http\Controllers\KategoriPembayaranController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\AksesKelasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\KategoriKeuanganController;
use App\Http\Controllers\TransaksiPembayaranController;
use App\Http\Controllers\TingkatanKelasController;
use App\Http\Controllers\SumberDanaController;

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
    return view('landingpage.index');
});
// Route::get('/', function () {
//     return redirect()->route('login');
// });


Route::middleware(['auth'])->group(function () {
  
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('datasiswa');
    Route::get('/datalaporan/laporansemester', function () {
        return view('datalaporan.laporansemester');
    });
    Route::get('/datalaporan/laporantahunan', function () {
        return view('datalaporan.laporantahunan');
    });
    Route::get('/histori', function () {
        return view('histori');
    });
    Route::get('/datakeuangan/rkas', function () {
        return view('datakeuangan.rkas');
    });
    Route::get('/datakeuangan/guru', function () {
        return view('datakeuangan.guru');
    });
    Route::get('/transaksisiswa/historisiswa', function () {
        return view('transaksisiswa.historisiswa');
    });
    Route::get('/activitylog', function () {
        return view('activitylog');
    });

    // datasiswa
    Route::middleware(['auth', 'role:admin'])->group(function () {
        
        Route::get('/cariSiswa', [DataSiswaController::class, 'cariSiswa'])->name('cariSiswa');
        Route::get('/datasiswa', [DataSiswaController::class, 'index'])->name('datasiswa');
        Route::get('/data-siswa/{id}', [DataSiswaController::class, 'getsiswa'])->name('getsiswa');
        Route::get('/datasiswa/create', [DataSiswaController::class, 'create'])->name('create');
        Route::post('/datasiswa/add', [DataSiswaController::class, 'store']);
        Route::delete('/datasiswa/{id}', [DataSiswaController::class, 'hapus']);
        Route::put('/datasiswa/{id}', [DataSiswaController::class, 'update']);
        Route::get('/datasiswa/{id}/edit', [DataSiswaController::class, 'edit']);
        Route::get('/datasiswa/{id}/detail', [DataSiswaController::class, 'detail']);
        Route::post('/import-siswa', [DataSiswaController::class, 'importSiswa'])->name('importSiswa');
    });

    // datakelas
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/datakelas', [DataKelasController::class, 'index'])->name('datakelas');
        Route::post('/datakelas/add', [DataKelasController::class, 'add']);
        Route::delete('/datakelas/{id}', [DataKelasController::class, 'hapus']);
        Route::put('/datakelas/{id}', [DataKelasController::class, 'update']);
        Route::get('/datakelas/{id}/edit', [DataKelasController::class, 'edit']);
        Route::get('/datakelas/{id}/detail', [DataKelasController::class, 'detail']);
        Route::get('/datakelas/{id}/show', [DataKelasController::class, 'show']);
    });

    // Kategori Pembayaran
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/kategoripembayaran', [KategoriPembayaranController::class, 'index'])->name('datakelas');
        Route::post('/kategoripembayaran/add', [KategoriPembayaranController::class, 'add']);
        Route::delete('/kategoripembayaran/{id}', [KategoriPembayaranController::class, 'hapus']);
        Route::put('/kategoripembayaran/{id}', [KategoriPembayaranController::class, 'update']);
        Route::get('/kategoripembayaran/{id}/edit', [KategoriPembayaranController::class, 'edit']);
    });

    // datakeuangan
    Route::middleware('role:guru,admin')->group(function () {
        Route::get('/datakeuangan', [KeuanganController::class, 'index'])->name('index');
        Route::get('/datakeuangan/create', [KeuanganController::class, 'create'])->name('create');
        Route::post('/datakeuangan/add', [KeuanganController::class, 'add'])->name('add');
        Route::get('/datakeuangan/{id}/detail', [KeuanganController::class, 'detail'])->name('detail');
        Route::get('/datakeuangan/{id}/edit', [KeuanganController::class, 'edit']);
        Route::delete('/datakeuangan/{id}', [KeuanganController::class, 'hapus']);
        Route::put('/datakeuangan/{id}', [KeuanganController::class, 'update']);
        Route::get('/datakeuangan/{id}', [KeuanganController::class, 'getkeuangan'])->name('getkeuangan');
        Route::post('/datakeuangan/rkas', [KeuanganController::class, 'rkas'])->name('rkas');
        Route::get('/datakeuangan/rkas', [KeuanganController::class, 'lihatRkas'])->name('lihatRkas');
        Route::get('/datakeuangan/{id}/review', [KeuanganController::class, 'review'])->name('review');
        Route::get('/datakeuangan/{id}/guru', [KeuanganController::class, 'guru'])->name('guru');
    });

    // sekolah
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah');
        Route::post('/sekolah/add', [SekolahController::class, 'add']);
        Route::delete('/sekolah/{id}', [SekolahController::class, 'hapus']);
        Route::put('/sekolah/{id}', [SekolahController::class, 'update']);
        Route::get('/sekolah/{id}/edit', [SekolahController::class, 'edit']);
        Route::get('/sekolah/{id}/detail', [SekolahController::class, 'detail']);
    });

    // akseskelas
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/akseskelas', [AksesKelasController::class, 'index'])->name('akseskelas');
        Route::post('/akseskelas/add', [AksesKelasController::class, 'add']);
        Route::delete('/akseskelas/{id}', [AksesKelasController::class, 'hapus']);
        Route::put('/akseskelas/{id}', [AksesKelasController::class, 'update']);
        Route::get('/akseskelas/{id}/edit', [AksesKelasController::class, 'edit']);
    });

    // saldo
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/saldo', [SaldoController::class, 'index'])->name('saldo');
        Route::post('/saldo/add', [SaldoController::class, 'add']);
        Route::delete('/saldo/{id}', [SaldoController::class, 'hapus']);
        Route::put('/saldo/{id}', [SaldoController::class, 'update']);
        Route::get('/saldo/{id}/edit', [SaldoController::class, 'edit']);
    });

    // kategori keuangan
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/kategorikeuangan', [KategoriKeuanganController::class, 'index'])->name('kategorikeuangan');
        Route::post('/kategorikeuangan/add', [KategoriKeuanganController::class, 'add']);
        Route::delete('/kategorikeuangan/{id}', [KategoriKeuanganController::class, 'hapus']);
        Route::put('/kategorikeuangan/{id}', [KategoriKeuanganController::class, 'update']);
        Route::get('/kategorikeuangan/{id}/edit', [KategoriKeuanganController::class, 'edit']);
    });
    // sumberdana
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/sumberdana', [SumberDanaController::class, 'index'])->name('sumberdana');
        Route::post('/sumberdana/add', [SumberDanaController::class, 'add']);
    });

    // Transaksi Pembayaran
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/transaksipembayaran', [TransaksiPembayaranController::class, 'index'])->name('transaksipembayaran');
        Route::post('/bayar', [TransaksiPembayaranController::class, 'bayar'])->name('bayar');
    });
    // Transaksi Siswa
    Route::middleware(['auth', 'role:siswa'])->group(function () {
        Route::get('/transaksisiswa', [TransaksiSiswaController::class, 'index'])->name('transaksisiswa');
        Route::post('/transaksisiswa/add', [TransaksiSiswaController::class, 'add']);
        Route::delete('/transaksisiswa/{id}', [TransaksiSiswaController::class, 'hapus']);
        Route::put('/transaksisiswa/{id}', [TransaksiSiswaController::class, 'update']);
        Route::get('/transaksisiswa/{id}/edit', [TransaksiSiswaController::class, 'edit']);
        Route::get('/transaksisiswa/{id}/detail', [TransaksiSiswaController::class, 'detail']);
        Route::get('/transaksisiswa/{id}/historisiswa', [TransaksiSiswaController::class, 'historisiswa']);
        Route::get('/transaksisiswa/{id}/show', [TransaksiSiswaController::class, 'show']);
    });
    // tingkatan kelas
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/tingkatankelas', [TingkatanKelasController::class, 'index'])->name('tingkatankelas');
        Route::post('/tingkatankelas/add', [TingkatanKelasController::class, 'add']);
        Route::put('/tingkatankelas/{id}', [TingkatanKelasController::class, 'update']);
        Route::get('/tingkatankelas/{id}/edit', [TingkatanKelasController::class, 'edit']);
        Route::delete('/tingkatankelas/{id}', [TingkatanKelasController::class, 'hapus']);
    });

    // Konfirmasi pembayaran
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/konfirmasi', [KonfirmasiController::class, 'index'])->name('konfirmasi');
        Route::post('/konfirmasi/add', [KonfirmasiController::class, 'add']);
        Route::get('/konfirmasi/{id}/show', [KonfirmasiController::class, 'show']);
        Route::put('/konfirmasi/{id}', [KonfirmasiController::class, 'update']);
    });


    Route::GET('getTingkatanKelas', [TingkatanKelasController::class, 'getKelas'])->name('getKota');
    Route::GET('getPembayaran', [TransaksiSiswaController::class, 'getPembayaran'])->name('getPembayaran');

    //ActivityLog
    //  Route::resource('Akun', UserController::class);
    Route::get('/activitylog', [ActivityLogController::class, 'index'])->name('Aktivitas');
});

require __DIR__ . '/auth.php';
