@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit kategori Keuangan</h1>
        </div> --}}

        <div class="mb-3">
            <a href="/kategorikeuangan">Kembali</a>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Kategori Keuangan</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="/kategorikeuangan/{{ $kategorikeuangan->id }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label fw-bold text-dark">Nama Keuangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_keuangan"
                                            placeholder="nama_keuangan" name="nama_keuangan"
                                            value="{{ $kategorikeuangan->nama_keuangan }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namaLengkap" class="col-sm-2 col-form-label fw-bold text-dark">Kategori Keuangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nis"
                                            placeholder="Kategori Keuangan" name="kategori_keuangan"
                                            value="{{ $kategorikeuangan->kategori_keuangan }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namaLengkap" class="col-sm-2 col-form-label fw-bold text-dark">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tempatLahir" name="deskripsi"
                                            placeholder="Deskripsi" value="{{ $kategorikeuangan->deskripsi }}">
                                    </div>
                                </div>


                                <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
