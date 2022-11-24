@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="pl-3 py-3 d-flex flex-row align-items-center justify-content-between">
            <h4 class="m-0 font-weight-bold text-primary">Transaksi Pembayaran</h1>
                <form action="{{ route('bayar') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">
                        Buka Pembayaran
                    </button>
                </form>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card header -->
                    <div class="card-body">
                        <form class="validation" novalidate method="POST" action="{{ url('transaksi/add') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label fw-semibold" for="nama_siswa" >Nama Siswa *</label>
                                    <select class="form-control selectpicker" id="select-country"
                                    data-live-search="true" >
                                        @foreach ($siswa as $ni)
                                            <option value="{{ $ni->id }}" data-tokens="{{ $ni->nama_siswa }}">
                                                {{ $ni->nama_siswa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label fw-semibold" for="kelas">NIS *</label>
                                    <input type="text" class="form-control" id="nis" placeholder="Kelas" required
                                        autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-10">
                                    <label class="form-control-label fw-semibold" for="bulan_pembayaran">Bulan
                                        Pembayaran *</label>
                                    <select class="form-control" name="bulan_pembayaran" id="bulan_pembayaran" required>
                                        <option selected disabled>Pilih...</option>
                                        @foreach ($transaksipembayaran->where('status_pembayaran', '!=', 'Proses')->where('status_pembayaran', '!=', 'Lunas') as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_keuangan }}
                                            </option>
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
                        </form>
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
            });
        </script>
        <script>
            $('#select-country').change(function() {
                var id = $(this).val();
                console.log('select-country', id)
                if (id) {
                    $.ajax({
                        type: "GET",
                        url: "getSiswaBayar/" + id,
                        dataType: 'JSON',
                        success: function(res) {
                            console.log(res, 'ambil data');
                            if (res) {
                                $("#bulan_pembayaran").empty();
                                // $("#kelas").val(res.nis);
                                $.each(res, function(key, value) {
                                    $('#bulan_pembayaran').append('<option value="' + value.id +
                                        '">' + value.nama_keuangan + '</option>');
                                });
                            } else {
                                $("#bulan_pembayaran").empty();
                            }
                        }
                    });
                } else {
                    $("#bulan_pembayaran").empty();
                }
            });
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
