@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Sekolah</h1>
        </div>
        <div class="form-group  mt-4">
            <div class="col-lg-4">
                <form action="/sekolah/{{ $sekolah->id }}" method="POST">
                    @method('put')
                    @csrf
                    <label for="cemail" class="control-label">Nama Sekolah</label>
                    <input class="form-control mb-3" type="text" name="nama_sekolah" placeholder="Nama Sekolah"
                        value="{{ $sekolah->nama_sekolah }}">

                    <label for="cemail" class="control-label">Derajat</label>
                    <input class="form-control mb-3" type="text" name="derajat"
                        placeholder="Derajat" value="{{ $sekolah->derajat }}">

                    <label for="cemail" class="control-label">Lokasi</label>
                    <input class="form-control mb-3" type="text" name="lokasi" placeholder="Lokasi"
                        value="{{ $sekolah->lokasi }}">

                    <label for="cemail" class="control-label">SPP</label>
                    <input class="form-control mb-3" type="number" name="spp" placeholder="Spp"
                        value="{{ $sekolah->spp }}">

                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">

                </form>
            </div>
        </div>
    </div>
@endsection
