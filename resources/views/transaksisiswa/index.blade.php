@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi Siswa</h1>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Form
                                Pembayaran</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Histori</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Invoice</button>
                        </li>
                    </ul>

                    <!-- Transaksi -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <!-- Card header -->

                                <div class="card-body">
                                    <form class="validation" novalidate method="POST"
                                        action="{{ url('transaksisiswa/add') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-control-label fw-semibold text-primary"
                                                    for="nama">Nama Siswa</label>
                                                <input class="form-control" value="{{ Auth::user()->name }}" readonly>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-control-label fw-semibold text-primary"
                                                    for="kelas">Kelas</label>
                                                <input type="text" class="form-control" id="kelas"
                                                    placeholder="Kelas" required autocomplete="off" readonly>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="transaksi"
                                                    class="form-control-label fw-semibold text-primary">Kategori
                                                    Pembayaran</label>
                                                <input type="text" class="form-control" id="kategori_pembayaran"
                                                    name="nama_keuangan" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-4 mb-10">
                                                <label class="form-control-label fw-semibold text-primary"
                                                    for="bulan_pembayaran">Bulan
                                                    Pembayaran *</label>
                                                <select class="form-control" name="bulan_pembayaran" id="bulan_pembayaran"
                                                    required>
                                                    <option selected disabled>==PILIH==</option>
                                                    @foreach ($transaksisiswa->where('status_pembayaran', '!=', 'Proses')->where('status_pembayaran', '!=', 'Lunas') as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_keuangan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-control-label fw-semibold text-primary"
                                                    for="name">Jumlah
                                                    Pembayaran</label>
                                                <input type="text" class="form-control" id="dengan-rupiah"
                                                    placeholder="Jumlah Pembayaran" name='jumlah_pembayaran' readonly>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="foto"
                                                    class="form-control-label fw-semibold text-primary">Bukti *</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    name="bukti_pembayaran">
                                            </div>
                                        </div>


                                        <button class="btn btn-primary" id="btn-submit" type="submit">Bayar</button>
                                </div>
                            </div>
                        </div>
                        <!-- Histori -->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="card-body">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="table1"
                                                >
                                                <thead>
                                                    <tr class="box bg-teal" role="row">
                                                        <th width="2%" class="text-center text-primary" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="No.: activate to sort column descending">No.
                                                        </th>
                                                        <th class="text-center text-primary" tabindex="0" aria-contr ols="example1"
                                                            rowspan="1" colspan="1" name="nama_siswa"
                                                            aria-label="Nama Pembayaran: activate to sort column ascending">
                                                            Nama Keuangan</th>
                                                        <th class="text-center text-primary" tabindex="0" aria-contr ols="example1"
                                                            rowspan="1" colspan="1" name="nama_siswa"
                                                            aria-label="Nama Pembayaran: activate to sort column ascending">
                                                            Jumlah</th>
                                                        <th class="text-center text-primary" tabindex="0" aria-contr ols="example1"
                                                            rowspan="1" colspan="1" name="nama_siswa"
                                                            aria-label="Nama Pembayaran: activate to sort column ascending">
                                                            Tanggal</th>
                                                        <th width="10%" class="text-center text-primary" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            name="xxx"
                                                            aria-label="xxx: activate to sort column ascending">
                                                            Bukti</th>
                                                        <th width="15%" class="text-center text-primary" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            name="xx"
                                                            aria-label="xx: activate to sort column ascending">
                                                            Status
                                                        </th>
                                                        <th width="15%" class="text-center text-primary" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            name="xx"
                                                            aria-label="xx: activate to sort column ascending">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transaksisiswa->where('status_pembayaran', '!=', 'Tolak')->where('status_pembayaran', '!=', 'Belum Lunas') as $ts)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{ $loop->iteration }}</td>
                                                            <td>{{ $ts->nama_keuangan }}</td>
                                                            <td>{{ 'Rp ' . number_format($ts->jumlah, 0, '.', '.') }}
                                                            </td>
                                                            <td>{{ $ts->tanggal }}</td>
                                                            <td>{{ $ts->bukti }}</td>
                                                            <td>{{ $ts->status_pembayaran }}</td>
                                                            <td class="d-flex">
                                                                <a href="/transaksisiswa/{{ $ts->id }}/show"
                                                                    id="2" class="edit me-2">
                                                                    <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-pencil-square"></i>
                                                                        Show
                                                                    </button>
                                                                </a>
                                                                {{-- <form action="/transaksisiswa/{{ $ts->id }}"
                                                                    method='post'>
                                                                    @csrf
                                                                    @method('delete')
                                                                    <input class="btn btn-outline-danger" type="submit"
                                                                        value="Hapus">
                                                                </form> --}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
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
                                $("#dengan-rupiah").val(formatRupiah(res.jumlah, 'Rp. '));
                                $("#kategori_pembayaran").val(res.nama_keuangan);
                            } else {
                                // $("#tingkatan_kelas").empty();
                            }
                        }
                    });
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
