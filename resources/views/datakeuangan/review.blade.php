@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <div class="d-flex flex-row align-items-center justify-content-between mb-3 py-3">
            {{-- <a href="/datakeuangan/guru">Kembali</a> --}}
            <h4 class="m-0 font-weight-bold text-primary mb-7">Review RKAS


            </h4>

        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Body -->
                    <div class="card-body pl-5">
                        <form action="/datakeuangan/{{ $keuangan->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <label for="kegiatan" class="col-sm-4 col-form-label fw-bold text-dark">Nama
                                    Kegiatan</label>
                                <div class="col-sm-5">
                                    :<label for="kegiatan" name="nama_keuangan" class="col-sm-8" readonly>
                                        {{ $keuangan->nama_keuangan }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <label for="tanggal" class="col-sm-4 col-form-label fw-bold text-dark">Tanggal
                                </label>
                                <div class="col-sm-6">
                                    :<label for="kegiatan" name="tanggal" class="col-sm-5" readonly>
                                        {{ $keuangan->tanggal }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <label for="Deskripsi" class="col-sm-4 col-form-label fw-bold text-dark">
                                    Deskripsi</label>
                                <div class="col-sm-5">
                                    :<label for="Deskripsi" name="deskripsi" class="col-sm-5" readonly>
                                        {{ $keuangan->deskripsi }}</label>
                                </div>
                            </div>
                            {{-- <div class="mb-3 row">
                                <label for="foto" class="col-sm-3 col-form-label fw-bold text-dark">Bukti</label>
                                <label for="foto" class="col-sm-3 col-form-label">: <img width="100"
                                        src="{{ asset('storage/Keuangan/bukti/' . $keuangan->bukti_transaksi) }}"
                                        alt="Profile"></label>
                            </div> --}}
                            <div class="row">
                                <label for="foto" class="col-sm-4 col-form-label fw-bold text-dark">Bekas
                                    Pendukung</label>
                                <label for="foto" class="col-sm-6 col-form-label">:<a
                                        href="{{ asset('storage/Keuangan/bukti/' . $keuangan->berkas_pendukung) }}" target="_blank"
                                        class="col-sm-5 fw-bold">Lihat disini</a>
                            </div>
                            <div class="row">
                                <label for="foto" class="col-sm-4 col-form-label fw-bold text-dark">Status</label>
                                <div class="form-check col-sm-2 col-form-label">
                                    <input class="form-check-input" type="radio" name="status_pembayaran"
                                        value="Diterima">
                                    <label class="form-check-label">
                                        Diterima
                                    </label>
                                </div>
                                <div class="form-check col-sm-2 col-form-label">
                                    <input class="form-check-input" type="radio" name="status_pembayaran" value="Ditolak">
                                    <label class="form-check-label">
                                        Ditolak
                                    </label>
                                </div>
                                <div class="form-check col-sm-2 col-form-label">
                                    <input class="form-check-input" type="radio" name="status_pembayaran" value="Proses">
                                    <label class="form-check-label">
                                        Diproses
                                    </label>
                                </div>
                            </div>

                            {{-- <form action="{{ url('datakeuangan/review/' . $keuangan->id) }}" method="POST">
                                @csrf --}}
                            <div class="row mb-3">
                                <label for="komentar" class="col-sm-4 col-form-label fw-bold text-dark">Komentar</label>
                                <input type="text" class="col-sm form-control @error('komentar') is-invalid @enderror"
                                    placeholder="komentar" name="komentar" id="komentar" value="{{ old('komentar') }}">
                            </div>

                            <div class="row">
                                <div class="col-md text-end">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="card border-left-success shadow-sm h-100 col-lg-6">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ 'Rp ' . number_format($keuangan->jumlah, 0, '.', '.') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-4 py-3">
                                <h6> status: </h6>
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
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xl-2 col-lg-5">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <h6>status: </h6>
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
                        </div>
                    </div>
                </div>
            </div> --}}

                <div class="card shadow-sm mb-4">
                    <div class="card-body">

                        <body>
                            <h6>How to disable downloading of the PDF document</h6>
                            <iframe
                                src="{{ asset('storage/Keuangan/bukti/' . $keuangan->berkas_pendukung) }}"
                                width="100%" height="300px">
                            </iframe>
                        </body>

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
