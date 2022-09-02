@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Approve Pembayaran</h1>
        </div>


        <div class="mb-3">
            <a href="/konfirmasi">Kembali</a>
        </div>


        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary ">Konfirmasi</h6>
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
                                <div class="mb-3 row">
                                    <label for="transaksi" class="col-sm-2 col-form-label fw-semibold text-dark">No
                                        Transaksi</label>
                                    <label for="transaksi" class="col-sm-2 col-form-label">:
                                        {{ $konfirmasi->no_transaksi }}</label>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Siswa" class="col-sm-2 col-form-label fw-semibold text-dark">Nama
                                        Siswa</label>
                                    <label for="Siswa" class="col-sm-2 col-form-label">:
                                        {{ $konfirmasi->User->name }}</label>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Siswa"
                                        class="col-sm-2 col-form-label fw-semibold text-dark">Nominal</label>
                                    <label for="Siswa" class="col-sm-2 col-form-label">:
                                        {{ 'Rp ' . number_format($konfirmasi->jumlah, 0, '.', '.') }}</label>
                                </div>
                                <div class="mb-3 row">
                                    <label for="keuangan" class="col-sm-2 col-form-label fw-semibold text-dark">Nama
                                        Keuangan</label>
                                    <label for="keuangan" class="col-sm-2 col-form-label">:
                                        {{ $konfirmasi->nama_keuangan }}</label>
                                </div>
                                <div class="mb-3 row">
                                    <label for="bukti"
                                        class="col-sm-2 col-form-label fw-semibold text-dark">Bukti</label>
                                    <label for="bukti" class="col-sm-5 col-form-label">: {{ $konfirmasi->bukti }}</label>
                                </div>
                                <div class="mb-3 row">
                                    <label for="status" class="col-sm-2 col-form-label fw-semibold text-dark">Status
                                        Pembayaran</label>
                                    <select class="col-sm-5 form-select form-select-lg form-control"
                                        aria-label="Default select example" name="status_pembayaran">:
                                        <option selected disabled>=== Status Pembayaran ===</option>
                                        <option value="Diterima" selected>Diterima</option>
                                        <option value="Belum Dibayar" selected>Belum Dibayar</option>
                                        <option value="Ditolak" selected>Ditolak</option>
                                        <option value="Proses" selected>Proses</option>
                                    </select>
                                </div>

                        </div>
                        <input class="btn btn-primary" type="submit" value="Approve" name="submit">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
