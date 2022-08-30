@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Sekolah</h1>
        </div>

        <div class="mb-3">
            <a href="/sekolah/{{ $sekolah->id }}/detail">Kembali</a>
        </div>


        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Sekolah</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="/sekolah/{{ $sekolah->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="mb-3 row">
                                    <label for="namasekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nama_sekolah"
                                            placeholder="Nama Sekolah" value="{{ $sekolah->nama_sekolah }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label">Derajat</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="text" name="derajat" placeholder="Derajat"
                                            value="{{ $sekolah->derajat }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="text" name="lokasi" placeholder="Lokasi"
                                            value="{{ $sekolah->lokasi }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label">SPP</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="number" name="spp" placeholder="Spp"
                                            value="{{ $sekolah->spp }}">
                                    </div>
                                </div>

                                <input class="btn btn-primary" type="submit" value="Submit" name="submit">

                                {{-- <div class="mb-3 row">
                                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nis" placeholder="NIS" name="nis"
                                        value="{{ $siswa->nis }}">
                                </div>
                            </div> --}}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
