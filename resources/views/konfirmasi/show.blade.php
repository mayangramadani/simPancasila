@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="d-flex flex-row align-items-center justify-content-center py-3">
            <h3 class="m-0 font-weight-bold text-primary mb-7">Konfirmasi Pembayaran
            </h3>
        </div>
        <p class="mb-5 text-center">Transaksi menunggu persetujuan, silahkan mengubah status pembayaran</p>

        <div class="row">
            <div class="col-xl-7 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="/konfirmasi/{{ $konfirmasi->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="col-md-12 mb-4" style="position: relative">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                                    </div>
                                    <p class="text-primary bg-white px-1 ml-3"
                                        style="position: absolute; top:10px;">
                                        Data
                                        Pembayaran</p>
                                </div>
                                <div class="row">
                                    <label for="jumlah" class="col-sm-5 col-form-label fw-semibold text-dark">Jumlah</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="jumlah" name="jumlah"
                                            class="mb-0 font-weight-bold"  readonly>
                                            {{ 'Rp ' . number_format($konfirmasi->jumlah, 0, '.', '.') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="status_pembayaran" class="col-sm-5 col-form-label fw-semibold text-dark">status_pembayaran</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="status_pembayaran" name="status_pembayaran"
                                            class="mb-0 font-weight-bold"  readonly>
                                            @if ($konfirmasi->status_pembayaran == 'Ditolak')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @elseif ($konfirmasi->status_pembayaran == 'Belum Dibayar')
                                            <span class="badge bg-danger">Belum Dibayar</span>
                                        @elseif($konfirmasi->status_pembayaran == 'Diterima')
                                            <span class="badge bg-success">Diterima</span>
                                        @elseif($konfirmasi->status_pembayaran == 'Proses')
                                            <span class="badge bg-warning">Proses</span>
                                        @else
                                            <span class="badge bg-dark">Belum diperiksa</span>
                                        @endif</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="transaksi" class="col-sm-5 col-form-label fw-semibold text-dark">No.
                                        Transaksi</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="no_transaksi" name="no_transaksi"
                                            class="mb-0" readonly>
                                            {{ $konfirmasi->no_transaksi }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="nama_siswa" class="col-sm-5 col-form-label fw-semibold text-dark">Nama
                                        Siswa</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="nama_siswa" name="nama_siswa"
                                            class="mb-0" readonly>
                                            {{ $konfirmasi->User->name }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="nama_keuangan" class="col-sm-5 col-form-label fw-semibold text-dark">Nama
                                        Keuangan</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="nama_keuangan" name="nama_keuangan"
                                            class="mb-0" readonly>
                                            {{ $konfirmasi->nama_keuangan }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="bukti"
                                        class="col-sm-5 col-form-label fw-semibold text-dark">Bukti</label>
                                    <div class="col d-flex align-items-center">
                                        <span class="me-3">:</span><label for="foto" class="mb-0"><a
                                                href="{{ asset('storage/Pembayaran/bukti/' . $konfirmasi->bukti) }}"
                                                target="_blank" class="fw-bold">Lihat disini</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="kegiatan"
                                        class="col-sm-5 col-form-label fw-semibold text-dark">Status</label>
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

                                {{-- <div class="row">
                                        <label for="foto"
                                            class="col-sm-3 col-form-label fw-bold text-dark">Status</label>
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
                                    </div> --}}

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
            <div class="col-lg-5 mb-4">

                <div class="card shadow-sm mb-4">
                    <div class="card-body">

                        <body>
                            <iframe src="{{ asset('storage/Pembayaran/bukti/' . $konfirmasi->bukti) }}" width="100%"
                                height="512px">
                            </iframe>
                        </body>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
