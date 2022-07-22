@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi Pembayaran</h1>
        </div>
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Transaksi Pembayaran</h6>
                    </div>

                    <div class="card">
                        <!-- Card header -->

                        {{-- <h3 class="mb-0">{{ $page_title }}</h3> --}}
                        @if (Session::has('message'))
                            <div class="alert alert-{{ Session::get('message_type') }} alert-dismissible fade show mt-3"
                                role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text"><strong>{{ ucwords(Session::get('message_type')) }}!</strong>
                                    {{ Session::get('message') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Error!</strong>
                                        {{ $error }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endforeach
                        @endif


                        <div class="card-body">
                            <form class="validation" novalidate method="POST" action="{{ url('transaksi/add') }}">
                                @csrf

                                <input type="number" name="users_id" id="users_id" hidden>
                                <input type="number" name="amount_transaksi" id="amount_transaksi" hidden>
                                <input type="number" name="total_transaksi" id="total_transaksi" hidden>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold" for="username">Nama Siswa *</label>
                                        <select id="nama_siswa" class="form-select" name="nama_siswa">
                                            <option selected>== Pilih Nama Siswa ==</option>
                                            @foreach ($siswa as $ni)
                                                <option value="{{ $ni->id }}">{{ $ni->nama_siswa }} |
                                                    {{ $ni->nama_kelas }}</option>
                                            @endforeach
                                        </select>

                                        <div class="invalid-feedback">
                                            Silahkan Isi Form NIS Terlebih Dahulu
                                        </div>
                                    </div>
                               
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold" for="kelas">Kelas *</label>
                                        <input type="text" class="form-control" id="kelas" placeholder="Kelas"
                                            required autocomplete="off" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="transaksi" class="form-control-label fw-semibold">Kategori
                                            Pembayaran</label>
                                        <select class="form-select form-select-lg form-control"
                                            aria-label="Default select example" name="jenis_transaksi">
                                            <option selected disabled>Jenis</option>
                                            @foreach ($kategoripembayaran as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_pembayaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-row" id="form-spp">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label fw-semibold" for="name">Pembayaran
                                                    Bulan Terakhir *</label>
                                                <input type="text" class="form-control" id="last_month"
                                                    placeholder="Nama Lengkap" required autocomplete="off" value="-"
                                                    readonly>
                                                <input type="number" id="last_month_int" hidden>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-control-label fw-semibold" for="for_month">Bayar Sampai
                                                    Bulan *</label>
                                                <select class="form-control" name="for_month" id="for_month" required>
                                                    <option selected disabled>== PILIH ==</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Pilih Jenis Kelamin Terlebih Dahulu.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-control-label fw-semibold text-primary" for="detail_transaksi">Rincian SPP
                                            *</label>
                                        <div class="card-deck" id="detail_transaksi">
                                            <div class="card bg-gradient-default">
                                                <div class="card-body">
                                                    <div class="mb-2">
                                                        <sup class="text-dark">Rp</sup> <span id="total_transaksi_display"
                                                            class="h2 text-dark">0</span>
                                                        <div class="text-dark mt-2 text-sm">Biaya SPP 1 Bulan
                                                        </div>
                                                        <div>
                                                            <span class="text-success font-weight-600">Rp <span
                                                                    id="amount_transaksi_display"
                                                                    class="text-success">0</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" id="btn-submit" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>


                    {{-- <div class="modal fade" id="studentsModal" tabindex="-1" role="dialog"
                        aria-labelledby="studentsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="studentsModalLabel">Pilih Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table" id="data-students">

                                            <thead>
                                                <tr>
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Rombel</th>
                                                </tr>
                                            </thead>
                                            @foreach ($siswa as $ni)
                                                <tbody>
                                                    <tr>
                                                        <th>{{ $ni->nis }}</th>
                                                        <th>{{ $ni->nama_siswa }}</th>
                                                        <th>{{ $ni->DataKelas->nama_kelas }}</th>
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}


                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- Optional JS -->
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $("#nis").click(function() {
            console.log("Erza");
            var id = $('#nis').val();
            $.ajax({
                url: 'data-siswa/' + id,
                type: 'get',
                data: {
                    id: id
                },
                success: function(response) {
                    console.log(id);
                    $('#namaLengkap').val(response.nama_siswa);
                    $('#rombel').val(response.nama_kelas);
                },
            });
        });
    </script>
@endpush
