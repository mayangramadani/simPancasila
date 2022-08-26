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
                                            aria-label="Default select example" name="nama_keuangan" readonly>
                                            <option selected disabled>Jenis</option>
                                            @foreach ($kategorikeuangan as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_keuangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-10">
                                        <label class="form-control-label fw-semibold" for="bulan_pembayaran">Bulan
                                            Pembayaran *</label>
                                        <select class="form-control" name="bulan_pembayaran" id="bulan_pembayaran" required>
                                            @foreach ($transaksipembayaran as $item)
                                                <option selected disabled>==PILIH==</option>
                                                <option value="{{ $item->id }}">{{ $item->nama_keuangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold" for="name">Jumlah
                                            Pembayaran *</label>
                                        <input type="text" class="form-control" id="dengan-rupiah"
                                            placeholder="Jumlah Pembayaran" name='jumlah_pembayaran' readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="foto" class="form-control-label fw-semibold">Bukti</label>
                                        <input class="form-control" type="file" id="formFile" name="bukti_pembayaran">
                                    </div>
                                </div>


                                <button class="btn btn-primary" id="btn-submit" type="submit">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>

            </form>
        </div>

        <div class="row">

            {{-- <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Pembayaran Siswa</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="table1" class="table datatable table-bordered table-hover no-footer">
                                            <thead>
                                                <tr class="box bg-teal" role="row">
                                                    <th width="4%" class="sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="No.: activate to sort column descending">No.</th>
                                                    <th class="sorting" tabindex="0" aria-contr ols="example1"
                                                        rowspan="1" colspan="1" name="nama_siswa"
                                                        aria-label="Nama Pembayaran: activate to sort column ascending">
                                                        Nama siswa</th>
                                                    <th width="10%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        name="xxx" aria-label="xxx: activate to sort column ascending">
                                                        xxx</th>
                                                    <th width="40%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        name="xxx"
                                                        aria-label="xxx: activate to sort column ascending">xxx
                                                    </th>
                                                    <th width="15%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        name="xx" aria-label="xx: activate to sort column ascending">
                                                        xx
                                                    </th>
                                                    <th width="10%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> --}}

        </div>

    </div>

    @push('scripts')
        <script>
            $(function() {
                $('.selectpicker').selectpicker();
            });
        </script>
        <script>
            $(document).ready(function() {
                console.log('asdas');
                $('#table1').DataTable();
            });
        </script>
        <script>
            $('#bulan_pembayaran').change(function() {
                var id = $(this).val();
                console.log('bulan_pembayaran', id)
                if (id) {
                    $.ajax({
                        type: "GET",
                        url: "getPembayaran?id=" + id,
                        dataType: 'JSON',
                        success: function(res) {
                            console.log(res);
                            if (res) {
                                $("#tingkatan_kelas").empty();
                                $("#dengan-rupiah").val(res.jumlah);
                            } else {
                                $("#tingkatan_kelas").empty();
                            }
                        }
                    });
                } else {
                    $("#kelurahan").empty();
                }
            });
        </script>
        <script>
            /* Dengan Rupiah */
            var dengan_rupiah = document.getElementById('dengan-rupiah');
            dengan_rupiah.addEventListener('keyup', function(e) {
                dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
            });

            /* Fungsi */
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        </script>
    @endpush
@endsection
