@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between py-2">
            <h4 class="pl-3 text-primary fw-bold">Histori Pembayaran Siswa</h4>
        </div>

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-3">
                    <!-- Card Header - Dropdown -->
                    <div class="card-body">
                        <div class="row">
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="table1" class="table-bordered">
                                            <thead>
                                                <tr class="box bg-primary" role="row">
                                                    <th width="2%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="No.: activate to sort column descending">No.
                                                    </th>
                                                    <th class="text-center text-light" tabindex="0" aria-contr
                                                        ols="example1" rowspan="1" colspan="1" name="nama_siswa"
                                                        aria-label="Nama Pembayaran: activate to sort column ascending">
                                                        Nama Keuangan</th>
                                                    <th class="text-center text-light" tabindex="0" aria-contr
                                                        ols="example1" rowspan="1" colspan="1" name="nama_siswa"
                                                        aria-label="Nama Pembayaran: activate to sort column ascending">
                                                        Jumlah</th>
                                                    <th class="text-center text-light" tabindex="0" aria-contr
                                                        ols="example1" rowspan="1" colspan="1" name="nama_siswa"
                                                        aria-label="Nama Pembayaran: activate to sort column ascending">
                                                        Tanggal</th>
                                                    <th width="10%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        name="xxx" aria-label="xxx: activate to sort column ascending">
                                                        Bukti</th>
                                                    <th width="15%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        name="xx" aria-label="xx: activate to sort column ascending">
                                                        Status
                                                    </th>
                                                    <th width="15%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        name="xx" aria-label="xx: activate to sort column ascending">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($transaksisiswa->where('status_pembayaran', '!=', 'Ditolak')->where('status_pembayaran', '!=', 'Belum Dibayar') as $ts)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                        <td class="text-center">{{ $ts->nama_keuangan }}</td>
                                                        <td class="text-center">
                                                            {{ 'Rp ' . number_format($ts->jumlah, 0, '.', '.') }}
                                                        </td>
                                                        <td class="text-center">{{ $ts->tanggal }}</td>
                                                        {{-- <td class="text-center">{{ $ts->bukti }}</td> --}}
                                                        <td class="text-center">
                                                            <img src="  {{ asset('storage/Keuangan/bukti/' . $ts->bukti) }}"
                                                                height="80">
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($ts->status_pembayaran == 'Ditolak')
                                                                <span class="badge bg-danger">Ditolak</span>
                                                            @elseif ($ts->status_pembayaran == 'Belum Dibayar')
                                                                <span class="badge bg-danger">Belum Dibayar</span>
                                                            @elseif($ts->status_pembayaran == 'Diterima')
                                                                <span class="badge bg-success">Diterima</span>
                                                            @elseif($ts->status_pembayaran == 'Proses')
                                                                <span class="badge bg-warning">Proses</span>
                                                            @else
                                                                <span class="badge bg-dark">Belum diperiksa</span>
                                                            @endif
                                                        </td>
                                                        <td class="d-flex justify-content-center">
                                                            <a href="/transaksisiswa/{{ $ts->id }}/show"
                                                                id="2" class="edit me-2" title="Invoice">
                                                                <button class="btn btn-outline-info btn-sm"
                                                                    type="button"><i class="fa fa-eye"></i>
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
