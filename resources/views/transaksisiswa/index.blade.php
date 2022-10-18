@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h1 class="h3 mb-0 text-gray-800">Transaksi Siswa</h1>
            <div class="col-md text-end"> <a href="/transaksisiswa/petunjuk" class="btn-sm btn-primary ">Petunjuk</a>
            </div>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->


                    <!-- Transaksi -->

                    <div class="card">
                        <div class="mt-4 row pl-3">
                            <p class="text">Isilah form berikut dengan data yang benar.</p>
                        </div>
                        <!-- Card header -->

                        <div class="card-body pl-5">
                            <form class="validation" novalidate method="POST" action="{{ url('transaksisiswa/add') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold text-primary" for="nama">Nama
                                            Siswa</label>
                                        <input class="form-control" value="{{ Auth::user()->name }}" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold text-primary"
                                            for="kelas">Kelas</label>
                                        <input type="text" class="form-control" id="kelas" placeholder="Kelas"
                                            required autocomplete="off" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-10">
                                        <label class="form-control-label fw-semibold text-primary"
                                            for="bulan_pembayaran">Bulan
                                            Pembayaran *</label>
                                        <select class="form-control" name="bulan_pembayaran" id="bulan_pembayaran" required>
                                            <option selected disabled>==PILIH==</option>
                                            @foreach ($transaksisiswa->where('status_pembayaran', '!=', 'Proses')->where('status_pembayaran', '!=', 'Lunas') as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_keuangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold text-primary" for="name">Jumlah
                                            Pembayaran</label>
                                        <input type="text" class="form-control" id="dengan-rupiah"
                                            placeholder="Jumlah Pembayaran" name='jumlah_pembayaran' readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="foto" class="form-control-label fw-semibold text-primary">Bukti
                                            *</label>
                                        <input class="form-control" type="file" id="formFile" name="bukti">
                                    </div>
                                </div>

                                <button class="btn btn-primary" id="btn-submit" type="submit">Bayar</button>
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
