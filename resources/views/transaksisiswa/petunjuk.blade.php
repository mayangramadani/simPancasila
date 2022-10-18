@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0 text-primary">Petunjuk Pembayaran</h5>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card">
                        <div class="mt-4 row pl-3">
                            <p class="text">Ikuti petunjuk dibawah ini dengan metode yang dipilih.</p>
                        </div>
                        <div class="card-body pl-5">
                            <!-- Card header -->
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                  <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">Bayar Langsung</button>
                                  <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Transfer Bank</button>
                                  <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Teller Bank</button>
                                  <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">E-wallet</button>
                                </div>
                                <div class="tab-content" id="v-pills-tabContent">
                                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <p class="fw-bold text-dark">PEMBAYARAN LANGSUNG DI SEKOLAH</p>
                                    <p>Kunjungi <span class="fw-bold">"Sekolah".</span></p>
                                    <p>Masuk ke <span class="fw-bold">"Tata Usaha".</span></p>
                                    <p>Kunjungi <span class="fw-bold">"Bendahara".</span></p>
                                    <p>Sampaikan Pembayaran Anda dan Siapkan <span class="fw-bold">Uang</span> Pembayaran Anda.</p>
                                  </div>
                                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <p class="fw-bold text-dark">LANGKAH 1 : TEMUKAN ATM TERDEKAT</p>
                                    <p>Masukkan kartu ATM Anda.</p>
                                    <p>Pilih <span class="fw-bold"> "Bahasa".</span></p>
                                    <p>Masukkan PIN ATM.</p>
                                    <p class="fw-bold text-dark">LANGKAH 2 : DETAIL PEMBAYARAN</p>
                                    <p>Pilih <span class="fw-bold"> "Menu Lainnya".</span></p>
                                    <p>Pilih <span class="fw-bold">"Transfer".</span></p>
                                    <p>Pilih jenis rekening yang akan Anda gunakan (contoh: "Dari Rekening Tabungan").</p>
                                    <p>Pilih <span class="fw-bold">"Virtual Account Billing"</span></p>
                                    <p>Masukkan nomor virtual account billing Anda <span class="text-danger">Bank ABC: 1234567890000xxxxx.</span></p>
                                </div>
                                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <p class="fw-bold text-dark">PEMBAYARAN TELLER BANK:</p>
                                    <p>Kunjungi <span class="fw-bold">bank</span> terdekat.</p>
                                    <p>Ambil <span class="fw-bold">nomor antrean</span>. Biasanya, satpam bank akan menyapa dan memandu kamu untuk mengambilnya.</p>
                                    <p>Siapkan <span class="fw-bold">uang</span> yang ingin ditransfer dan juga nomor rekening tujuan <span class="text-danger">Bank ABC: 1234567890000xxxxx</span>.</p>
                                    <p>Isi <span class="fw-bold">formulir</span> transfer sebelum ke teller. Pastikan kamu mengisinya dengan benar.</p>
                                    <p>Kalau sudah, masuk ke jalur antrean di depan meja teller. Jika giliranmu tiba, teller akan memanggil.</p>
                                    <p>Berikan formulir yang sudah diisi tadi dan uangnya. Teller akan menginput data sesuai formulir.</p>
                                    <p>Tunggu hingga proses pengiriman uang selesai. Teller akan memberikan copy formulir transfer untuk pengirim.</p>
                                  </div>
                                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    <p class="fw-bold text-dark">PEMBAYARAN MENGGUNAKAN E-WALLET:</p>
                                    <p>Login ke akun <span class="fw-bold">"E-wallet"</span> Anda.</p>
                                    <p>Pilih menu <span class="fw-bold">"Bayar"</span> atau <span class="fw-bold">"Transfer"</span>.</p>
                                    <p>Masukkan nama <span class="fw-bold">bank penerima </span><span class="text-danger">Bank ABC</span> dan <span class="fw-bold">nomor rekeningnya </span><span class="text-danger"> 1234567890000xxxxx</span>.</p>
                                    <p>Masukkan <span class="fw-bold">nominal</span> yang mau ditransfer.</p>
                                    <p>Konfirmasi pembayaran dengan <span class="fw-bold">PIN.</span></p>
                                    <p>Transaksi selesai.</p>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
