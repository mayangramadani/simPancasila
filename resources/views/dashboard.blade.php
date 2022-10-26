@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        {{-- {{ Breadcrumbs::render('dashboard') }} --}}
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-5">
            <h6 class="d-sm-mb-0 text-gray-500">Selamat Datang di Halaman, Dashboard</h6>
        </div>

        @if (Auth::user()->role == 'admin')
            <!-- Content Row -->
            <div class="row mb-4">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4 mr-3">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Saldo</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ 'Rp ' . number_format($jumlahSaldo, 0, '.', '.') }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4 mr-3">
                    <div class="card border-left-success shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-5">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Debit (Pemasukan)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ 'Rp ' . number_format($debit->sum('debit'), 0, '.', '.') }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4 mr-3">
                    <div class="card border-left-info shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kredit (Pengeluaran)
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ 'Rp ' . number_format($kredit->sum('kredit'), 0, '.', '.') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow-sm mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow-sm animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow-sm mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow-sm animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Direct
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Social
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i> Referral
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span>
                            </h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Color System -->
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary text-white shadow-sm">
                                <div class="card-body">
                                    Primary
                                    <div class="text-white-50 small">#4e73df</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-success text-white shadow-sm">
                                <div class="card-body">
                                    Success
                                    <div class="text-white-50 small">#1cc88a</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-info text-white shadow-sm">
                                <div class="card-body">
                                    Info
                                    <div class="text-white-50 small">#36b9cc</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-warning text-white shadow-sm">
                                <div class="card-body">
                                    Warning
                                    <div class="text-white-50 small">#f6c23e</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-danger text-white shadow-sm">
                                <div class="card-body">
                                    Danger
                                    <div class="text-white-50 small">#e74a3b</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-secondary text-white shadow-sm">
                                <div class="card-body">
                                    Secondary
                                    <div class="text-white-50 small">#858796</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-light text-black shadow-sm">
                                <div class="card-body">
                                    Light
                                    <div class="text-black-50 small">#f8f9fc</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-dark text-white shadow-sm">
                                <div class="card-body">
                                    Dark
                                    <div class="text-white-50 small">#5a5c69</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 mb-4">

                    <!-- Illustrations -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Transfer</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                    src="img/undraw_posting_photo.svg" alt="...">
                            </div>
                            <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank"
                                    rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                constantly updated collection of beautiful svg images that you can use
                                completely free and without attribution!</p>
                            <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                unDraw &rarr;</a>
                        </div>
                    </div>

                    <!-- Approach -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                        </div>
                        <div class="card-body">
                            <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                CSS bloat and poor page performance. Custom CSS classes are used to create
                                custom components and custom utility classes.</p>
                            <p class="mb-0">Before working with this theme, you should become familiar with the
                                Bootstrap framework, especially the utility classes.</p>
                        </div>
                    </div>

                </div>
            </div>
        @endif

        @if (Auth::user()->role == 'siswa')
            <!-- Content Row -->
            <div class="row mb-4">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4 mr-3">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Diterima</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $dashboard->where('status_pembayaran', 'Diterima')->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4 mr-3">
                    <div class="card border-left-success shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-5">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        DiProses</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $dashboard->where('status_pembayaran', 'Proses')->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-spinner fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4 mr-3">
                    <div class="card border-left-info shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ditolak
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ $dashboard->where('status_pembayaran', 'Ditolak')->count() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ban fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-8 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Cara Melakukan Transaksi Pembayaran</h6>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                          <img src="{!! asset('asset/img/cara.png') !!}" alt=""
                                        width="800px">
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 mb-4">

                    <!-- Illustrations -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Nomor Rekening</h6>
                        </div>
                        <div class="card-body">
                            <p class="text-dark">BANK BNI : <span class="fw-bold">9876543210</span></p>
                            <p class="text-dark">BANK BRI : <span class="fw-bold">9876543210</span></p>
                            <p class="text-dark">BANK MANDIRI : <span class="fw-bold">9876543210</span></p>
                            
                        </div>
                    </div>
                </div>
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
        @endif
        @if (Auth::user()->role == 'guru')
            <!-- Content Row -->
            <div class="row mb-4">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4 mr-3">
                    <div class="card border-left-primary shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Diterima</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $dashboard->where('kategori_keuangan_id', '3')->where('status_pembayaran', 'Diterima')->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4 mr-3">
                    <div class="card border-left-success shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-5">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        DiProses</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $dashboard->where('kategori_keuangan_id', '3')->where('status_pembayaran', 'Proses')->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-spinner fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4 mr-3">
                    <div class="card border-left-info shadow-sm h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ditolak
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ $dashboard->where('kategori_keuangan_id', '3')->where('status_pembayaran', 'Ditolak')->count() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ban fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-8 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Cara Melakukan Transaksi Pembayaran</h6>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                          <img src="{!! asset('asset/img/rkas.png') !!}" alt=""
                                        width="800px">
                        </div>
                    </div>

                </div>

                {{-- <div class="col-lg-4 mb-4">

                    <!-- Illustrations -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Nomor Rekening</h6>
                        </div>
                        <div class="card-body">
                            <p class="text-dark">BANK BNI : <span class="fw-bold">9876543210</span></p>
                            <p class="text-dark">BANK BRI : <span class="fw-bold">9876543210</span></p>
                            <p class="text-dark">BANK MANDIRI : <span class="fw-bold">9876543210</span></p>
                            
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="row">

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
                </div> --}}
        @endif


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    </body>

    </html>
    </div>
@endsection
