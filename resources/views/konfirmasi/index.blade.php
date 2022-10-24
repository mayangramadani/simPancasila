@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="m-0 font-weight-bold text-primary">Konfirmasi Pembayaran</h5>
        </div>


        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active position-relative" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Status 
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $konfirmasi->where('status_pembayaran', 'Proses')->count() }}
                                    <span class="visually-hidden">unread messages</span>
                                </span></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">History</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="card-body">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="table1" class="table-bordered">
                                                <thead>
                                                    <tr class="box bg-primary" role="row">
                                                        <th width="4%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="No.: activate to sort column descending">
                                                            No.</th>
                                                        <th width="15%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="No.: activate to sort column descending">
                                                            No. Transaksi</th>
                                                        <th class="text-center text-light" tabindex="0" aria-contr
                                                            ols="example1" rowspan="1" colspan="1" name="nama_siswa"
                                                            aria-label="Nama Pembayaran: activate to sort column ascending">
                                                            Nama siswa</th>
                                                        <th width="10%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            id="dengan-rupiah"
                                                            aria-label="xxx: activate to sort column ascending">
                                                            Nominal</th>
                                                        <th width="16%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-label="xxx: activate to sort column ascending">
                                                            Status Pembayaran</th>
                                                        <th width="16%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-label="xxx: activate to sort column ascending">
                                                            Bukti Pembayaran</th>
                                                        <th width="10%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-label="Action: activate to sort column ascending">
                                                            Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($konfirmasi as $item)
                                                        <tr role="row" class="odd">
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center">{{ $item->no_transaksi }}</td>
                                                            <td class="text-center">{{ $item->User->name }}</td>
                                                            <td class="text-center">
                                                                {{ 'Rp ' . number_format($item->jumlah, 0, '.', '.') }}</td>
                                                            <td class="text-center">
                                                                @if ($item->status_pembayaran == 'Ditolak')
                                                                    <span class="badge bg-danger">Ditolak</span>
                                                                @elseif ($item->status_pembayaran == 'Belum Dibayar')
                                                                    <span class="badge bg-danger">Belum Dibayar</span>
                                                                @elseif($item->status_pembayaran == 'Diterima')
                                                                    <span class="badge bg-success">Diterima</span>
                                                                @elseif($item->status_pembayaran == 'Proses')
                                                                    <span class="badge bg-warning">Proses</span>
                                                                @else
                                                                    <span class="badge bg-dark">Belum diperiksa</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center"><img
                                                                    src="  {{ asset('storage/Keuangan/bukti/' . $item->bukti) }}"
                                                                    height="80"></td>
                                                            <td
                                                                class="d-flex justify-content-center
                                                        ">
                                                                <a href="/konfirmasi/{{ $item->id }}/show"
                                                                    id="2" class=" me-2">
                                                                    <button class="btn btn-outline-info btn-sm"
                                                                        type="button"><i class="fa fa-eye"></i>
                                                                        Show
                                                                    </button>
                                                                </a>
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
                        <!-- Histori -->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="card-body">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="table2" class="table-bordered" role="grid"
                                            aria-describedby="example1_info">
                                                <thead>
                                                    <tr class="box bg-primary" role="row">
                                                        <th width="4%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="No.: activate to sort column descending">
                                                            No.</th>
                                                        <th width="15%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="No.: activate to sort column descending">
                                                            No. Transaksi</th>
                                                        <th class="text-center text-light" tabindex="0" aria-contr
                                                            ols="example1" rowspan="1" colspan="1"
                                                            name="nama_siswa"
                                                            aria-label="Nama Pembayaran: activate to sort column ascending">
                                                            Nama siswa</th>
                                                        <th width="10%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            id="dengan-rupiah"
                                                            aria-label="xxx: activate to sort column ascending">
                                                            Nominal</th>
                                                        <th width="16%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-label="xxx: activate to sort column ascending">
                                                            Status Pembayaran</th>
                                                        <th width="20%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-label="xxx: activate to sort column ascending">
                                                            Bukti Pembayaran</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($history as $item)
                                                        <tr role="row" class="odd">
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center">{{ $item->no_transaksi }}</td>
                                                            <td class="text-center">{{ $item->User->name }}</td>
                                                            <td class="text-center">
                                                                {{ 'Rp ' . number_format($item->jumlah, 0, '.', '.') }}</td>
                                                            <td class="text-center">
                                                                @if ($item->status_pembayaran == 'Ditolak')
                                                                    <span class="badge bg-danger">Ditolak</span>
                                                                @elseif ($item->status_pembayaran == 'Belum Dibayar')
                                                                    <span class="badge bg-danger">Belum Dibayar</span>
                                                                @elseif($item->status_pembayaran == 'Diterima')
                                                                    <span class="badge bg-success">Diterima</span>
                                                                @elseif($item->status_pembayaran == 'Proses')
                                                                    <span class="badge bg-warning">Proses</span>
                                                                @else
                                                                    <span class="badge bg-dark">Belum diperiksa</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center"><img
                                                                    src="  {{ asset('storage/Keuangan/bukti/' . $item->bukti) }}"
                                                                    height="80"></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- Buka Pembayaran -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                        </div>
                    </div>
                </div>
            </div>
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
                $('#table2').DataTable();
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
