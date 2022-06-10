@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Siswa</h1>
        </div>


        <div class="mb-3">
            <a href="/datasiswa">Kembali</a>
        </div>


        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="{{ url('datasiswa/add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nis" placeholder="NIS" name="nis">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namaLengkap" name="nama_siswa"
                                            placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namaLengkap" class="col-sm-2 col-form-label">Kelas</label>
                                    <div class="col-sm-10">
                                        <select class="form-select form-select-lg form-control" name="kelas_id">
                                            <option>=== Pilih Kelas ===</option>
                                            @foreach ($datakelas as $ni)
                                                <option value="{{ $ni->id }}">{{ $ni->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namaLengkap" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tempatLahir" name="tempat_lahir"
                                            placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal_lahir">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="inlineRadio1" value="Laki-laki">
                                            <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="inlineRadio2" value="Perempuan">
                                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                    <div class="col-sm-10">
                                        <select class="form-select form-select-lg form-control" name="agama"
                                            aria-label="Default select example">
                                            <option selected>Agama</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Hindu">Hindu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea type="textarea" class="form-control" id="alamat" placeholder="Alamat Lengkap" name="alamat" value></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="noHP" class="col-sm-2 col-form-label">No. HP</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="noHP" name="no_hp"
                                            placeholder="081234567890">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="foto">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">Nama Orang Tua</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Ayah" name="ayah">
                                        <input type="text" class="form-control mt-2" placeholder="Ibu" name="ibu">
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
