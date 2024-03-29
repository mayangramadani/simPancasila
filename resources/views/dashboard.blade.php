@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        {{-- {{ Breadcrumbs::render('dashboard') }} --}}
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
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
                            <h6 class="m-0 font-weight-bold text-primary">Transaksi Pembayaran</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow-sm animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Status:</div>
                                    <a class="dropdown-item" href="#" onclick="updateChartStatus()">Semua</a>
                                    <a class="dropdown-item" href="#"
                                        onclick="updateChartStatus('Dibayar')">Dibayar</a>
                                    <a class="dropdown-item" href="#" onclick="updateChartStatus('Proses')">Proses</a>
                                    <a class="dropdown-item" href="#"
                                        onclick="updateChartStatus('Belum Dibayar')">Belum Bayar</a>
                                    <a class="dropdown-item" href="#"
                                        onclick="updateChartStatus('Ditolak')">Ditolak</a>
                                    {{-- <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a> --}}
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart" data-url="{{ url('chart-transaksi') }}"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">

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

                <!-- Pie Chart -->
                {{-- <div class="col-xl-4 col-lg-5">
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
                                    <a class="dropdown-item" href="#">Semua</a>
                                    <a class="dropdown-item" href="#">Dibayar</a>
                                    <a class="dropdown-item" href="#">Proses</a>
                                    <a class="dropdown-item" href="#">Belum Bayar</a>
                                    <a class="dropdown-item" href="#">Ditolak</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart" width="400" height="400"></canvas>

                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i>XXX
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
                </div> --}}
            


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
                            <img src="{!! asset('asset/img/cara.png') !!}" alt="" width="800px">
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
                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="false">Bayar Langsung</button>
                                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-profile" type="button" role="tab"
                                            aria-controls="v-pills-profile" aria-selected="false">Transfer Bank</button>
                                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-messages" type="button" role="tab"
                                            aria-controls="v-pills-messages" aria-selected="false">Teller Bank</button>
                                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-settings" type="button" role="tab"
                                            aria-controls="v-pills-settings" aria-selected="false">E-wallet</button>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">
                                            <p class="fw-bold text-dark">PEMBAYARAN LANGSUNG DI SEKOLAH</p>
                                            <p>Kunjungi <span class="fw-bold">"Sekolah".</span></p>
                                            <p>Masuk ke <span class="fw-bold">"Tata Usaha".</span></p>
                                            <p>Kunjungi <span class="fw-bold">"Bendahara".</span></p>
                                            <p>Sampaikan Pembayaran Anda dan Siapkan <span class="fw-bold">Uang</span>
                                                Pembayaran Anda.</p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                            aria-labelledby="v-pills-profile-tab">
                                            <p class="fw-bold text-dark">LANGKAH 1 : TEMUKAN ATM TERDEKAT</p>
                                            <p>Masukkan kartu ATM Anda.</p>
                                            <p>Pilih <span class="fw-bold"> "Bahasa".</span></p>
                                            <p>Masukkan PIN ATM.</p>
                                            <p class="fw-bold text-dark">LANGKAH 2 : DETAIL PEMBAYARAN</p>
                                            <p>Pilih <span class="fw-bold"> "Menu Lainnya".</span></p>
                                            <p>Pilih <span class="fw-bold">"Transfer".</span></p>
                                            <p>Pilih jenis rekening yang akan Anda gunakan (contoh: "Dari Rekening
                                                Tabungan").</p>
                                            <p>Pilih <span class="fw-bold">"Virtual Account Billing"</span></p>
                                            <p>Masukkan nomor virtual account billing Anda <span class="text-danger">Bank
                                                    ABC: 1234567890000xxxxx.</span></p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                            aria-labelledby="v-pills-messages-tab">
                                            <p class="fw-bold text-dark">PEMBAYARAN TELLER BANK:</p>
                                            <p>Kunjungi <span class="fw-bold">bank</span> terdekat.</p>
                                            <p>Ambil <span class="fw-bold">nomor antrean</span>. Biasanya, satpam bank akan
                                                menyapa dan memandu kamu untuk mengambilnya.</p>
                                            <p>Siapkan <span class="fw-bold">uang</span> yang ingin ditransfer dan juga
                                                nomor rekening tujuan <span class="text-danger">Bank ABC:
                                                    1234567890000xxxxx</span>.</p>
                                            <p>Isi <span class="fw-bold">formulir</span> transfer sebelum ke teller.
                                                Pastikan kamu mengisinya dengan benar.</p>
                                            <p>Kalau sudah, masuk ke jalur antrean di depan meja teller. Jika giliranmu
                                                tiba, teller akan memanggil.</p>
                                            <p>Berikan formulir yang sudah diisi tadi dan uangnya. Teller akan menginput
                                                data sesuai formulir.</p>
                                            <p>Tunggu hingga proses pengiriman uang selesai. Teller akan memberikan copy
                                                formulir transfer untuk pengirim.</p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                            aria-labelledby="v-pills-settings-tab">
                                            <p class="fw-bold text-dark">PEMBAYARAN MENGGUNAKAN E-WALLET:</p>
                                            <p>Login ke akun <span class="fw-bold">"E-wallet"</span> Anda.</p>
                                            <p>Pilih menu <span class="fw-bold">"Bayar"</span> atau <span
                                                    class="fw-bold">"Transfer"</span>.</p>
                                            <p>Masukkan nama <span class="fw-bold">bank penerima </span><span
                                                    class="text-danger">Bank ABC</span> dan <span class="fw-bold">nomor
                                                    rekeningnya </span><span class="text-danger">
                                                    1234567890000xxxxx</span>.</p>
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
                            <img src="{!! asset('asset/img/rkas.png') !!}" alt="" width="800px">
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
        @endif


    </div>
    <!-- /.container-fluid -->

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
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [""],
                    datasets: [{
                        label: "Earnings",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: [],
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return '$' + value;
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ':' + tooltipItem.yLabel;
                            }
                        }
                    }
                }
            });


            function updateChartStatus(status = null) {
                var url = $(ctx).data("url");
                if (status != null) {
                    var url = url + "?status=" + status;
                }
                $.getJSON(url, function(data) {
                    myLineChart.data.labels = data["month"];
                    myLineChart.data.datasets[0].data = data["total"];
                    myLineChart.update();
                })

            }
            updateChartStatus();
          
        </script>
    @endpush
@endsection
