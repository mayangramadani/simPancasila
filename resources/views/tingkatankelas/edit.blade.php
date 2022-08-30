@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit tingkatan kelas</h1>
        </div> --}}

        {{-- <div class="mb-3">
            <a href="/tingkatankelas">Kembali</a>
        </div> --}}
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/tingkatankelas">Kembali</a></li>
                <li class="breadcrumb-item font-weight-bold"><a href="#">Edit Tingkatan Kelas</a></li>
            </ol>
        </nav>


        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">TINGKATAN KELAS</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="/tingkatankelas/{{ $tingkatankelas->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="mb-3 row">
                                    <label for="namaSekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
                                    <div class="col-sm-10">
                                        <select class="form-select form-select-lg mb-3 form-control" name="sekolah_id">
                                            @foreach ($sekolah as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label">Tingkatan Kelas</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="text" name="tingkatan_kelas"
                                            placeholder="tingkatan kelas" value="{{ $tingkatankelas->tingkatan_kelas }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label">Deskripsi</label>
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

    </div>
@endsection
