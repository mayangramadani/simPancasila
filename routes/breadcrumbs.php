<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.


// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


// Dashboard
// Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
//     $trail->push('Dashboard', route('dashboard'));
// });

// Dashboard > Pembayaran
Breadcrumbs::for('pembayaran', function (BreadcrumbTrail $trail) {
    // $trail->parent('dashboard');
    $trail->push('Pembayaran', route('pembayaran'));
});

Breadcrumbs::for('tampilkan', function (BreadcrumbTrail $trail) {

    $trail->parent('pembayaran');
    $trail->push('Detail Pembayaran', route('tampilkan'));
});

Breadcrumbs::for('konfirmasi', function (BreadcrumbTrail $trail) {
    $trail->parent('tampilkan');
    $trail->push('Konfirmasi', route('konfirmasi'));
});

// Dashboard > Pembayaran > Konfirmasi
// Breadcrumbs::for('konfirmasi', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('pembayaran');
//     $trail->push('Konfirmasi', route('konfirmasi'));
// });

Breadcrumbs::for('datasiswa', function (BreadcrumbTrail $trail) {
    // $trail->parent('dashboard');
    $trail->push('Data Siswa', route('datasiswa'));
});

Breadcrumbs::for('tambahsiswa', function (BreadcrumbTrail $trail) {
    $trail->parent('datasiswa');
    $trail->push('Tambah Siswa', route('tambahsiswa'));
});

Breadcrumbs::for('datakelas', function (BreadcrumbTrail $trail) {
    // $trail->parent('dashboard');
    $trail->push('Data Kelas', route('datakelas'));
});

Breadcrumbs::for('tambahkelas', function (BreadcrumbTrail $trail) {
    $trail->parent('datakelas');
    $trail->push('Tambah Kelas', route('tambahkelas'));
});
