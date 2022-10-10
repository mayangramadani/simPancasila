@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Sekolah</h1>
        </div> --}}

        <div class="mb-3">
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
                                    <label for="cemail" class="col-sm-2 col-form-label">tingkatan kelas</label>
                                    <div class="col-sm-10">
                                        <select class="form-select form-select-lg form-control" name="tingkatan_kelas_id">
                                            @foreach ($tingkatankelas as $item)
                                                <option value="{{ $item->id }}">{{ $item->tingkatan_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label">Kelas</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="text" name="nama_kelas"
                                            placeholder="nama_kelas" value="{{ $datakelas->nama_kelas }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label">kuota</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="text" name="kuota" placeholder="kuota"
                                            value="{{ $datakelas->kuota }}">
                                    </div>
                                </div>

                                <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Kelas</h1>
        </div>
       
        <div class="card-body">
            <div class="p-3">
                <div class="form-group  mt-4">
                    <div class="col-lg-4">
                        <form action="/datakelas/{{ $datakelas->id }}" method="POST">
                            @method('put')
                            @csrf
                            <label for="cemail" class="control-label">Nama Sekolah</label>
                            <select class="form-select form-select-lg mb-3 form-control" name="sekolah_id">
                                @foreach ($sekolah as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                                @endforeach
                            </select>

                            <label for="cemail" class="control-label fw-bold text-primary">Nama Kelas</label>
                            <input class="form-control mb-3" type="text" name="nama_kelas" placeholder="Nama Kelas"
                                value="{{ $datakelas->nama_kelas }}">

                            <label for="cemail" class="control-label">Nama Kelas</label>
                            <input class="form-control mb-3" type="text" name="nama_kelas" placeholder="Nama Kelas"
                                value="{{ $datakelas->nama_kelas }}">

                            <label for="cemail" class="control-label">Tingkatan Kelas</label>
                            <select class="form-select form-select-lg mb-3 form-control" name="tingkatan_kelas">
                                <option value="Kelas 8" @if ($datakelas->tingkatan_kelas == 'Kelas 8') selected @endif>Kelas 8</option>
                                <option value="Kelas 7" @if ($datakelas->tingkatan_kelas == 'Kelas 7') selected @endif>Kelas 7</option>
                                <option value="Kelas 9" @if ($datakelas->tingkatan_kelas == 'Kelas 9') selected @endif>Kelas 9</option>
                                <option value="Ekstrakurikuler" @if ($datakelas->tingkatan_kelas == 'Ekstrakurikuler') selected @endif>
                                    Ekstrakurikuler
                                </option>
                                <option value="Bimbel" @if ($datakelas->tingkatan_kelas == 'Bimbel') selected @endif>Bimbel</option>
                            </select>

                            <label for="cemail" class="control-label">Kuota</label>
                            <input class="form-control mb-3" type="number" name="kuota" min="0"
                                placeholder="Kuota" value="{{ $datakelas->kuota }}">
                            <input class="btn btn-primary" type="submit" value="Submit" name="submit">

                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
