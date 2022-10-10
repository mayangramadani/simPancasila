@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Approve Pembayaran</h1>
        </div> --}}


        <div class="mb-3">
            <a href="/konfirmasi">Kembali</a>
        </div>


        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary ">Konfirmasi pembayaran</h4>
                            {{-- <div class="d-flex">
                                <a href="/konfirmasi/{{ $siswa->id }}/edit" id="2" class="edit me-2">
                                    <button class="btn btn-outline-info" type="button">
                                        Edit
                                    </button>
                                </a>
                                <form action="/konfirmasi/{{ $siswa->id }}" method='post'>
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-outline-danger" type="submit" value="Hapus">
                                </form>
                            </div> --}}
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="/konfirmasi/{{ $konfirmasi->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <label for="transaksi" class="col-sm-2 col-form-label fw-bold text-dark">No
                                        Transaksi</label>
                                    <label for="transaksi" class="col-sm-2 col-form-label">:
                                        {{ $konfirmasi->no_transaksi }}</label>
                                </div>
                                <div class="row">
                                    <label for="Siswa" class="col-sm-2 col-form-label fw-bold text-dark">Nama
                                        Siswa</label>
                                    <label for="Siswa" class="col-sm-2 col-form-label">:
                                        {{ $konfirmasi->User->name }}</label>
                                </div>
                                <div class="row">
                                    <label for="Siswa"
                                        class="col-sm-2 col-form-label fw-bold text-dark">Nominal</label>
                                    <label for="Siswa" class="col-sm-2 col-form-label">:
                                        {{ 'Rp ' . number_format($konfirmasi->jumlah, 0, '.', '.') }}</label>
                                </div>
                                <div class="row">
                                    <label for="keuangan" class="col-sm-2 col-form-label fw-bold text-dark">Nama
                                        Keuangan</label>
                                    <label for="keuangan" class="col-sm-2 col-form-label">:
                                        {{ $konfirmasi->nama_keuangan }}</label>
                                </div>
                                <div class="row">
                                    <label for="bukti"
                                        class="col-sm-2 col-form-label fw-bold text-dark">Bukti</label>
                                        <label for="foto" class="col-sm-5 col-form-label">:{{ $konfirmasi->bukti }} <a href="#" target="_blank" class="col-sm-5 fw-bold">Lihat disini</a>
                                    
                                </div>
                                <div class="row">
                                    <label for="foto" class="col-sm-3 col-form-label fw-bold text-dark">Status</label>
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
                                </div>
    
                                {{-- <form action="{{ url('konfirmasi/show/' .$konfirmasi->id) }}" method="POST">
                                    @csrf --}}
                                    <div class="row mb-3">
                                        <label for="komentar" class="col-sm-2 col-form-label fw-bold text-dark">Komentar</label>
                                        <input type="text" class="col-sm form-control @error('komentar') is-invalid @enderror" placeholder="komentar"
                                            name="komentar" id="komentar" value="{{ old('komentar') }}">
                                    </div>
    
                               
    
                                <div class="row">
                                    <div class="col-md text-end">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
