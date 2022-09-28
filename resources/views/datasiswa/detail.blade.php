@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="mb-3">
            <a href="/datasiswa">Kembali</a>
        </div>


        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary ">Data Siswa</h6>
                            <div class="d-flex">
                                <a href="/datasiswa/{{ $siswa->id }}/edit" id="2" class="edit me-2">
                                    <button class="btn btn-outline-info btn-sm" type="button"><i
                                            class="fa fa-pencil-square"></i>
                                        Edit
                                    </button>
                                </a>
                                <form action="/datasiswa/{{ $siswa->id }}" method='post'>
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger btn-sm" type="submit"><i
                                            class="fas fa-trash-alt"></i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <div class="row">
                                <label for="nis" class="col-sm-2 col-form-label fw-semibold text-dark">NIS</label>
                                <label for="nis" class="col-sm-5 form-control text-dark" readonly>{{ $siswa->nis }}</label>
                            </div>
                            <div class="row">
                                <label for="namaLengkap" class="col-sm-2 col-form-label fw-semibold text-dark">Nama
                                    Lengkap</label>
                                <label for="namaLengkap" class="col-sm-5 form-control text-dark" readonly>                                    {{ $siswa->nama_siswa }}</label>
                            </div>
                            <div class="row">
                                <label for="namaLengkap" class="col-sm-2 col-form-label fw-semibold text-dark">Tempat
                                    Lahir</label>
                                <label for="namaLengkap" class="col-sm-5 form-control text-dark" readonly>                                    {{ $siswa->tempat_lahir }}</label>
                            </div>
                            <div class="row">
                                <label for="tanggal" class="col-sm-2 col-form-label fw-semibold text-dark">Tanggal</label>
                                <label for="tanggal" class="col-sm-5 form-control text-dark" readonly>{{ $siswa->tanggal_lahir }}</label>
                            </div>
                            <div class="row">
                                <label for="jenisKelamin" class="col-sm-2 col-form-label fw-semibold text-dark">Jenis
                                    Kelamin</label>
                                <label for="jenisKelamin" class="col-sm-5 form-control text-dark" readonly>                                    {{ $siswa->jenis_kelamin }}</label>
                            </div>
                            <div class="row">
                                <label for="agama" class="col-sm-2 col-form-label fw-semibold text-dark">Agama</label>
                                <label for="agama" class="col-sm-5 form-control text-dark" readonly>{{ $siswa->agama }}</label>
                            </div>
                            <div class="row">
                                <label for="alamat" class="col-sm-2 col-form-label fw-semibold text-dark">Alamat</label>
                                <label for="alamat" class="col-sm-5 form-control text-dark" readonly>{{ $siswa->alamat }}</label>
                            </div>
                            <div class="row">
                                <label for="noHP" class="col-sm-2 col-form-label fw-semibold text-dark">No. HP</label>
                                <label for="noHP" class="col-sm-5 form-control text-dark" readonly>{{ $siswa->no_hp }}</label>
                            </div>
                            <div class="row">
                                <label for="foto" class="col-sm-2 col-form-label fw-semibold text-dark">Foto</label>
                                <label for="foto" class="col-sm-5 form-control text-dark" readonly>{{ $siswa->foto }} </label>

                            </div>
                            <div class="row">
                                <label for="nis" class="col-sm-2 col-form-label fw-semibold text-dark">Nama
                                    Ayah</label>
                                <label for="nis" class="col-sm-5 form-control text-dark" readonly>{{ $siswa->ayah }}</label>
                            </div>
                            <div class="row">
                                <label for="nis" class="col-sm-2 col-form-label fw-semibold text-dark">Nama Ibu</label>
                                <label for="nis" class="col-sm-5 form-control text-dark" readonly>{{ $siswa->ibu }}</label>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
