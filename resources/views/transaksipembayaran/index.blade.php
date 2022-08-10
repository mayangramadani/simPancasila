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

                        <div class="card-body">
                            <form class="validation" novalidate method="POST" action="{{ url('transaksi/add') }}">
                                @csrf

                                <input type="number" name="users_id" id="users_id" hidden>
                                <input type="number" name="amount_transaksi" id="amount_transaksi" hidden>
                                <input type="number" name="total_transaksi" id="total_transaksi" hidden>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold" for="nama">Nama Siswa *</label>
                                        <select class="form-control selectpicker" id="select-country"
                                            data-live-search="true">
                                            @foreach ($siswa as $ni)
                                                <option value="{{ $ni->id }}" data-tokens="{{ $ni->nama_siswa }}">
                                                    {{ $ni->nama_siswa }}</option>
                                            @endforeach
                                        </select>
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
                                                <label class="form-control-label fw-semibold" for="bulan_pembayaran">Bulan Pembayaran *</label>
                                                <select class="form-control" name="bulan_pembayaran" id="bulan_pembayaran" required>
                                                    <option selected disabled>== PILIH ==</option>
                                                </select>
                                            </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-control-label fw-semibold" for="name">Jumlah Pembayaran *</label>
                                                    <input type="text" class="form-control" id="jumlah_pembayaran"
                                                        placeholder="Jumlah Pembayaran" name= >
                                                </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="foto" class="form-control-label fw-semibold">Bukti</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    name="bukti_pembayaran">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <button class="btn btn-primary" id="btn-submit" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
        rel="stylesheet" />

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
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>
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
