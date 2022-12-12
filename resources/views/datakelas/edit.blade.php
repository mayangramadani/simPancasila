@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-flex flex-row align-items-center justify-content-center py-3">
            <h3 class="m-0 font-weight-bold text-primary mb-7">Update Data Data Kelas
            </h3>
        </div>
        <p class="mb-5 text-center">Silakan input form pada data yang ingin dirubah, klik <a href="/tingkatankelas">Data Kelas</a> jika
            ingin melihat daftar Data Kelas </p>

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="">
                            <form action="/datakelas/{{ $datakelas->id }}" method="POST">
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
                                    <label for="tingkatankelas" class="form-control-label fw-semibold text-dark">Tingkatan Kelas
                                    </label>
                                    <input value="{{ $datakelas->TingkatanKelas->tingkatan_kelas }}" type="text"
                                        class="form-control form-control-md" id="tingkatan_kelas"
                                         name="tingkatan_kelas">
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-4 mb-3">
                                        <label for="kelas"
                                            class="form-control-label fw-semibold text-dark">Kelas <span class="fw-light"></span></label>
                                        <input value="{{ $datakelas->nama_kelas }}" type="text"
                                            class="form-control form-control-md" id="kelas"
                                             name="nama_kelas">
                                    </div>
                        
                                </div>
                                    <div class="col-md-4 mb-5">
                                        <label for="kuota" class="col-form-label text-dark fw-semibold">Kuota</label>
                                        <input rows="5" type="number" class="form-control form-control-md" id="kuota"
                                            name="kuota" value="{{ $datakelas->kuota }}">
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
        <div class="mb-3 btn btn-outline-primary btn-sm">
            <a href="/datakelas/{{ $datakelas->id }}/detail">Kembali</a>
        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Edit Sekolah</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="/datakelas/{{ $datakelas->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label text-dark fw-bold">Tingkatan Kelas</label>
                                    <div class="col-sm-10">
                                        <select class="form-select form-select-lg form-control" name="tingkatan_kelas_id">
                                            @foreach ($tingkatankelas as $item)
                                                <option value="{{ $item->id }}">{{ $item->tingkatan_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label text-dark fw-bold">Kelas</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nama_kelas"
                                            placeholder="nama_kelas" value="{{ $datakelas->nama_kelas }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label text-dark fw-bold">Kuota</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="text" name="kuota" placeholder="kuota"
                                            value="{{ $datakelas->kuota }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
