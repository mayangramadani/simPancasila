<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMP Sinar Pancasila - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{!! asset('asset/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{!! asset('asset/css/sb-admin-2.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('asset/css/sb-admin-2.css') !!}" rel="stylesheet">
    <link href="{!! asset('asset/css/style.css') !!}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}

    <!-- Javascript Bootstrap Datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <script src="https://kit.fontawesome.com/c2ff6e34d8.js" crossorigin="anonymous"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center p-1" href="/dashboard">
                <div class="sidebar-brand-icon logo-brand">
                    <img src="{!! asset('asset/img/Logo.png') !!}" alt="">
                </div>
                <h6 class="nav-link fw-bold text-white mb-0">Sistem Informasi</h6>
                <h6 class="sidebar-brand-text fw-semibold text-white">Administrasi Sekolah</h6>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link fw-semibold" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="/sekolah">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Sekolah</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLap"
                        aria-expanded="true" aria-controls="collapseLap">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Kelas</span>
                    </a>
                    <div id="collapseLap" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">--Pembayaran--</h6>
                            <a class="collapse-item" href="/datakelas">Data kelas</a>
                            <a class="collapse-item" href="/tingkatankelas">Tingkatan Kelas</a>
                            <a class="collapse-item" href="/akseskelas">Akses Kelas</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaptt"
                        aria-expanded="true" aria-controls="collapseLap">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Siswa</span>
                    </a>
                    <div id="collapseLaptt" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">--Siswa--</h6>
                            <a class="collapse-item" href="/datasiswa">Data Siswa</a>
                            <a class="collapse-item" href="/datasiswa/blm-bayar">Siswa Belum Bayar</a>
                        </div>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/datasiswa">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Data Siswa</span>
                    </a>
                </li> --}}
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- Nav Item - Pages Collapse Menu -->
            @if (Auth::user()->role == 'admin')
                <div class="sidebar-heading">
                    Keuangan
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="/kategorikeuangan">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Kategori Keuangan</span>
                    </a>
                </li>
            @endif

            <!-- Nav Item - Pages Collapse Menu -->
            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/datakeuangan">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Keuangan</span>
                    </a>
                </li>
            @endif


            <!-- Nav Item - Pages Collapse Menu -->
            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/saldo">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Saldo</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLapP"
                        aria-expanded="true" aria-controls="collapseLap">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pembayaran</span>
                    </a>
                    <div id="collapseLapP" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">--Pembayaran--</h6>
                            <a class="collapse-item" href="/transaksipembayaran">Transaksi Pembayaran</a>
                            <a class="collapse-item" href="/konfirmasi">Konfirmasi Pembayaran</a>
                        </div>
                    </div>
                </li>
            @endif

            @if (Auth::user()->role == 'siswa')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/transaksisiswa">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Transaksi Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/transaksisiswa/historisiswa">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Histori</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'guru')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/datakeuangan/tambah-rkas">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Form RKAS</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 'guru')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/datakeuangan/guru">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Status RKAS</span>
                    </a>
                </li>
            @endif

            {{-- @if (Auth::user()->role == 'siswa')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/transaksisiswa/historisiswa">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Histori Siswa</span>
                    </a>
                </li>
            @endif --}}

            {{-- @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLapX"
                        aria-expanded="true" aria-controls="collapseLap">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Laporan Keuangan</span>
                    </a>
                    <div id="collapseLapX" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">--Keuangan--</h6>
                            <a class="collapse-item" href="/datalaporan">Laporan Semester</a>
                            <a class="collapse-item" href="#">Laporan Tahunan</a>
                        </div>
                    </div>
                </li>
            @endif --}}


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('sweetalert::alert')
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="/notification" id="alertsDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span
                                    class="badge badge-danger badge-counter">{{ Auth::user()->unreadNotifications->count() }}</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi
                                </h6>
                                @foreach (Auth::user()->notifications as $item)
                                    <a class="dropdown-item d-flex align-items-center" href="/notification">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">Terbayar</div>
                                            <span class="font-weight-bold">{{ $item->data['message'] }}</span>
                                        </div>
                                    </a>
                                @endforeach

                                <a class="dropdown-item text-center small text-gray-500" href="/notification">Show
                                    All
                                    Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        {{-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a> --}}
                        <!-- Dropdown - Messages -->
                        {{-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{!! asset('asset/img/undraw_profile_1.svg') !!}" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{!! asset('asset/img/undraw_profile_2.svg') !!}" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{!! asset('asset/img/undraw_profile_3.svg') !!}" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy
                                            with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle"
                                            src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More
                                    Messages</a>
                            </div> --}}
                        {{-- </li> --}}

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{!! asset('asset/img/undraw_profile.svg') !!}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="/setting">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="/activitylog">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                @yield('container')

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
                        <a class="btn btn-primary" href="/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>

        <!-- Bootstrap core JavaScript-->
        <script src="{!! asset('asset/vendor/jquery/jquery.min.js') !!}"></script>
        <script src="{!! asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{!! asset('asset/js/sb-admin-2.min.js') !!}"></script>

        <!-- Page level plugins -->
        <script src="{!! asset('asset/vendor/chart.js/Chart.min.js') !!}"></script>

        <!-- Page level custom scripts -->
        {{-- <script src="{!! asset('asset/js/demo/chart-area-demo.js') !!}"></script> --}}
        <script src="{!! asset('asset/js/demo/chart-pie-demo.js') !!}"></script>
        @stack('scripts')
</body>

</html>
