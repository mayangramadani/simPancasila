@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->

    <div class="container-fluid">
        <div class="d-flex flex-row align-items-center justify-content-center py-3">
            <h3 class="m-0 font-weight-bold text-primary mb-7">Update Data Tingkatan Kelas
            </h3>
        </div>
        <p class="mb-5 text-center">Silakan input form pada data yang ingin dirubah, klik <a href="/tingkatankelas">Tingkatan Kelas</a> jika
            ingin melihat daftar Tingkatan Kelas </p>

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="">
                            <form action="/tingkatankelas/{{ $tingkatankelas->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="col-md-12 mb-5" style="position: relative">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                                    </div>
                                    <p class="text-primary bg-white px-1 ml-3" style="position: absolute; top:10px;">
                                        Update Data</p>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="namasekolah" class="form-control-label fw-semibold text-dark">Nama
                                        Sekolah
                                    </label>
                                    <input value="{{ $tingkatankelas->Sekolah->nama_sekolah }}" type="text"
                                        class="form-control form-control-md" id="nama_sekolah"
                                         name="nama_sekolah">
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-4 mb-3">
                                        <label for="tingkatankelas"
                                            class="form-control-label fw-semibold text-dark">Tingkatan Kelas <span class="fw-light"></span></label>
                                        <input value="{{ $tingkatankelas->tingkatan_kelas }}" type="text"
                                            class="form-control form-control-md" id="tingkatankelas"
                                             name="tingkatankelas">
                                    </div>
                        
                                </div>
                                    <div class="col-md-8 mb-5">
                                        <label for="deskripsi" class="col-form-label text-dark fw-semibold">Deskripsi</label>
                                        <textarea rows="5" type="textarea" class="form-control form-control-md" id="deskripsi"
                                            name="deskripsi" value>{{ $tingkatankelas->deskripsi }}</textarea>
                                    </div>
                                <div class="col-md-12">
                                    <input class="btn btn-md btn-primary w-100 btn-block" type="submit" value="SIMPAN DATA"
                                        name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid">

        

        <div class="mb-3">
            <a href="/tingkatankelas">Kembali</a>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Tingkatan Kelas</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="/tingkatankelas/{{ $tingkatankelas->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="mb-3 row">
                                    <label for="namaSekolah" class="col-sm-2 col-form-label fw-bold text-dark">Nama Sekolah</label>
                                    <div class="col-sm-10">
                                        <select class="form-select form-select-lg mb-3 form-control" name="sekolah_id">
                                            @foreach ($sekolah as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label fw-bold text-dark">Tingkatan Kelas</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="text" name="tingkatan_kelas"
                                            placeholder="tingkatan kelas" value="{{ $tingkatankelas->tingkatan_kelas }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label fw-bold text-dark">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="text" name="deskripsi"
                                            placeholder="deskripsi" value="{{ $tingkatankelas->deskripsi }}">
                                    </div>
                                </div>


                                <input class="btn btn-primary" type="submit" value="Submit" name="submit">

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
@endsection
