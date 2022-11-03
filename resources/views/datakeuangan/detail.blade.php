@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        {{-- <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Data Keuangan</h1>
        </div> --}}
        <div class="mb-3">
            <a href="/datakeuangan">Kembali</a>
        </div>
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary ">Buku Kas Umum Sekolah</h4>
                        <div class="d-flex">
                            <a href="/datakeuangan/{{ $keuangan->id }}/edit" id="2" class="edit me-2">
                                <button class="btn btn-outline-info btn-sm" type="button"><i
                                        class="fa fa-pencil-square"></i>
                                    Edit
                                </button>
                            </a>
                            <form action="/datakeuangan/{{ $keuangan->id }}" method='post'>
                                @csrf
                                @method('delete')
                                <input class="btn btn-outline-danger btn-sm" type="submit" value="Hapus">
                            </form>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <div class="row">
                                <label for="user" class="col-sm-3 col-form-label fw-bold text-dark">Nama User</label>
                                <div class="col-sm-8">
                                    <label for="user" class="col-sm-8 form-control text-dark" readonly>
                                        {{ $keuangan->users_id }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <label for="sekolah" class="col-sm-3 col-form-label fw-bold text-dark">Kategori
                                    Keuangan</label>
                                <div class="col-sm-8">
                                    <label for="sekolah" class="col-sm-8 form-control text-dark" readonly>
                                        {{ $keuangan->KategoriKeuangan->nama_keuangan }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <label for="sekolah" class="col-sm-3 col-form-label fw-bold text-dark">Nama
                                    Keuangan</label>
                                <div class="col-sm-8">
                                    <label for="sekolah" class="col-sm-8 form-control text-dark" readonly>
                                        {{ $keuangan->nama_keuangan }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <label for="jumlahtransaksi" class="col-sm-3 col-form-label fw-bold text-dark">Jumlah
                                    Transaksi</label>
                                <div class="col-sm-8">
                                    <label for="jumlahtransaksi" class="col-sm-8 form-control text-dark" id="dengan-rupiah"
                                        readonly>
                                        {{ 'Rp ' . number_format($keuangan->jumlah, 0, '.', '.') }} </label>
                                </div>
                            </div>
                            <div class="row">
                                <label for="tanggal" class="col-sm-3 col-form-label fw-bold text-dark">Tanggal
                                    Transaksi</label>
                                <div class="col-sm-8">
                                    <label for="tanggal" class="col-sm-8 form-control text-dark"
                                        readonly>{{ $keuangan->tanggal }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <label for="Deskripsi" class="col-sm-3 col-form-label fw-bold text-dark">Deskripsi</label>
                                <div class="col-sm-8">
                                    <label for="Deskripsi" class="col-sm-8 form-control text-dark" readonly>
                                        {{ $keuangan->deskripsi }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <label for="foto" class="col-sm-3 col-form-label fw-bold text-dark">Bukti</label>
                                <label for="foto" class="col-sm-3 col-form-label"><img
                                        src="  {{ asset('storage/Keuangan/bukti/' . $keuangan->bukti_transaksi) }}"
                                        height="80"></label>
                            </div>
                            <div class="row">
                                <label for="statuspembayaran" class="col-sm-3 col-form-label fw-bold text-dark">Status
                                    Pembayaran</label>
                                <label for="statuspembayaran" class="col-sm-3 col-form-label">:
                                    @if ($keuangan->status_pembayaran == 'Ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @elseif ($keuangan->status_pembayaran == 'Belum Dibayar')
                                        <span class="badge bg-danger">Belum Dibayar</span>
                                    @elseif($keuangan->status_pembayaran == 'Diterima')
                                        <span class="badge bg-success">Diterima</span>
                                    @elseif($keuangan->status_pembayaran == 'Proses')
                                        <span class="badge bg-warning">Proses</span>
                                    @else
                                        <span class="badge bg-dark">Belum diperiksa</span>
                                    @endif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <body>
                            <h5>How to disable downloading of the PDF document</h5>
                            <iframe src="/uploads/media/default/0001/01/540cb75550adf33f281f29132dddd14fded85bfc.pdf#toolbar=0" width="100%" height="500px">
                            </iframe>
                          </body>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
            <script>
                $(document).ready(function() {
                    console.log('asdas');
                    $('#table1').DataTable();
                    //coba jquery
                    // $('#saldo').inputmask()

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

                });
            </script>
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script> --}}
        @endpush
    @endsection
