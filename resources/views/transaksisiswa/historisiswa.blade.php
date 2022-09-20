@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Histori Pembayaran Siswa</h1>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Histori</h6>
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
                                                        Nama Keuangan</th>
                                                    <th class="sorting" tabindex="0" aria-contr ols="example1"
                                                        rowspan="1" colspan="1" name="nama_siswa"
                                                        aria-label="Nama Pembayaran: activate to sort column ascending">
                                                        Jumlah</th>
                                                    <th class="sorting" tabindex="0" aria-contr ols="example1"
                                                        rowspan="1" colspan="1" name="nama_siswa"
                                                        aria-label="Nama Pembayaran: activate to sort column ascending">
                                                        Tanggal</th>
                                                    <th width="10%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        name="xxx" aria-label="xxx: activate to sort column ascending">
                                                        Bukti</th>
                                                    <th width="15%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        name="xx" aria-label="xx: activate to sort column ascending">
                                                        Status
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
                                                        {{-- <td class="d-flex">
                                                            <a href="/transaksisiswa/{{ $ts->id }}/edit"
                                                                id="2" class="edit me-2">
                                                                <button class="btn btn-outline-info" type="button">
                                                                    Edit
                                                                </button>
                                                            </a>
                                                            <form action="/transaksisiswa/{{ $ts->id }}"
                                                                method='post'>
                                                                @csrf
                                                                @method('delete')
                                                                <input class="btn btn-outline-danger" type="submit"
                                                                    value="Hapus">
                                                            </form>
                                                        </td> --}}
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
