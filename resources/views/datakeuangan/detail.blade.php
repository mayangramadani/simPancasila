@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-flex flex-row align-items-center justify-content-center py-3">
            <h3 class="m-0 font-weight-bold text-primary mb-7">Detail Transaksi Keuangan
            </h3>
        </div>
        <p class="mb-5 text-center">Halaman detail, klik <a href="/datakeuangan">Kembali</a> untuk ke halaman BKU</p>

        <div class="row">

            <!-- Area Chart -->
          
            <div class="col-xl-7 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="/datakeuangan/{{ $keuangan->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="col-md-12 mb-4" style="position: relative">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                                    </div>
                                    <p class="text-primary bg-white px-1 ml-3"
                                        style="position: absolute; top:10px;">
                                        Data
                                        Keuangan</p>
                                </div>
                                <div class="row">
                                    <label for="jumlah" class="col-sm-5 col-form-label fw-semibold text-dark">Jumlah</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="jumlah" name="jumlah"
                                            class="mb-0 font-weight-bold"  readonly>
                                            {{ 'Rp ' . number_format($keuangan->jumlah, 0, '.', '.') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="status_pembayaran" class="col-sm-5 col-form-label fw-semibold text-dark">status</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="status_pembayaran" name="status_pembayaran"
                                            class="mb-0 font-weight-bold"  readonly>
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
                                        @endif</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="kategori_keuangan" class="col-sm-5 col-form-label fw-semibold text-dark">kategori keuangan</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="kategori_keuangan" name="kategori_keuangan"
                                            class="mb-0"  readonly>
                                            {{ $keuangan->KategoriKeuangan->nama_keuangan }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="nama_keuangan" class="col-sm-5 col-form-label fw-semibold text-dark">Nama keuangan</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="nama_keuangan" name="nama_keuangan"
                                            class="mb-0"  readonly>
                                            {{ $keuangan->nama_keuangan }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="tanggal" class="col-sm-5 col-form-label fw-semibold text-dark">Tanggal</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="tanggal" name="tanggal"
                                            class="mb-0"  readonly>
                                            {{ $keuangan->tanggal }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="deskripsi" class="col-sm-5 col-form-label fw-semibold text-dark">Deskripsi</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="deskripsi" name="deskripsi"
                                            class="mb-0"  readonly>
                                            {{ $keuangan->deskripsi }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="deskripsi" class="col-sm-5 col-form-label fw-semibold text-dark">Bukti</label>
                                    <label for="foto" class="col-sm-6 col-form-label">:<a
                                        href="{{ asset('storage/Keuangan/bukti/' . $keuangan->bukti) }}" target="_blank"
                                        class="col-sm-5 fw-bold">Lihat disini</a>
                                </label>
                                </div>
                                <div class="row">
                                    <label for="kegiatan" class="col-sm-5 col-form-label fw-semibold text-dark">Status</label>
                                    <div class="col">
                                        <div class="form-check col-sm-2 col-form-label">
                                            <input class="form-check-input" type="radio" name="status_pembayaran"
                                                value="Diterima">
                                            <label class="form-check-label">
                                                Diterima
                                            </label>
                                        </div>
                                        <div class="form-check col-sm-2 col-form-label">
                                            <input class="form-check-input" type="radio" name="status_pembayaran"
                                                value="Ditolak">
                                            <label class="form-check-label">
                                                Ditolak
                                            </label>
                                        </div>
                                        <div class="form-check col-sm-2 col-form-label">
                                            <input class="form-check-input" type="radio" name="status_pembayaran"
                                                value="Proses">
                                            <label class="form-check-label">
                                                Diproses
                                            </label>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row mb-3 mt-2">
                                    <div class="col-12">
                                        <input type="text"
                                            class="col-md form-control @error('komentar') is-invalid @enderror"
                                            placeholder="Masukkan Komentar" name="komentar" id="komentar"
                                            value="{{ old('komentar') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="">
                                        <button class="btn btn-primary w-100 btn-block">Simpan</button>
                                    </div>
                                </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
         

            
            <div class="col-xl-5 col-lg-5">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">

                        <body>
                            <iframe src="{{ asset('storage/Keuangan/bukti/' . $keuangan->berkas_pendukung) }}"
                                width="100%" height="512px">
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
