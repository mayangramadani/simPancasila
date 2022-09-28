@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <h4 class="text-dark">Data Siswa</h4>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/datasiswa">Data Siswa</a></li>
                <li class="breadcrumb-item active">Tambah Siswa</li>
            </ol>
        </nav>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->

                    <!-- Card Body -->
                    <div class="card-body pl-5">
                        <p>Isilah form berikut dengan data yang benar.</p>
                        <div class="p-2">
                            <form action="{{ url('datasiswa/add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3 mb-2">
                                    <div class="col-lg-5 col-md-9 col-sm-10">
                                        <label for="namaSekolah" class="col-form-label text-dark">Sekolah</label>
                                        <select class="form-select form-select-lg form-control-sm" name="sekolah_id">
                                            <option>Pilih...</option>
                                            @foreach ($sekolah as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_sekolah }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-2">
                                    <div class="col-lg-5 col-md-9 col-sm-10">
                                        <label for="nis" class="col-form-label text-dark">NIS</label>
                                        <input type="text" class="form-control form-control-sm" id="nis"
                                            placeholder="NIS" name="nis">
                                    </div>
                                    <div class="col-lg-5 col-md-9 col-sm-10">
                                        <label for="namaLengkap" class="col-form-label text-dark">Nama
                                            Lengkap</label>
                                        <input type="text" class="form-control form-control-sm" id="namaLengkap"
                                            name="nama_siswa" placeholder="Nama Lengkap">

                                    </div>
                                </div>
                                <div class="row mt-3 mb-2">
                                    <div class="col-lg-5 col-md-9 col-sm-10">
                                        <label for="namaLengkap" class="col-form-label text-dark">Tempat
                                            Lahir</label>
                                        <input type="text" class="form-control form-control-sm" id="tempatLahir"
                                            name="tempat_lahir" placeholder="Tempat Lahir">
                                    </div>

                                    <div class="col-lg-5 col-md-9 col-sm-10">
                                        <label for="tanggal" class="col-form-label text-dark">Tanggal</label>
                                        <input type="date" class="form-control form-control-sm" name="tanggal_lahir">
                                    </div>
                                </div>

                                <div class="row mt-3 mb-2">
                                    <div class="col-lg-5 col-md-9 col-sm-10">
                                        <label for="jenisKelamin" class="col-form-label text-dark">Jenis
                                            Kelamin</label>
                                        <div class="col-lg-6 col-md-9 col-sm-10">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="inlineRadio1" value="Laki-laki">
                                            <label class="form-check-label form-check form-check-inline mr-4"
                                                for="inlineRadio1">Laki-Laki</label>
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="inlineRadio2" value="Perempuan">
                                            <label class="form-check-label form-check form-check-inline"
                                                for="inlineRadio2">Perempuan</label>
                                        </div>
                                    </div>
                               

                                <div class="col-lg-5 col-md-9 col-sm-10">
                                    <label for="agama" class="col-form-label text-dark">Agama</label>
                                    <select class="form-select form-select-lg form-control form-control-sm" name="agama"
                                        aria-label="Default select example">
                                        <option selected>Pilih...</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col-lg-5 col-md-9 col-sm-10">
                            <label for="alamat" class="col-form-label text-dark">Alamat</label>
                            <textarea type="textarea" class="form-control form-control-sm" id="alamat" placeholder="Jalan" name="alamat" value></textarea>

                            {{-- <div class="col-lg-5 col-md-9 col-sm-10">
                                        <table id="table1" class="table-bordered" role="grid"
                                            aria-describedby="example1_info">
                                            <tbody>
                                                <tr>
                                                    <td class="text-dark fw-semibold" width="50" bgcolor="#D3DBEB">
                                                        Jalan
                                                    </td>
                                                    <td class="text-dark">xxxxssssssssssssssss</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-semibold" bgcolor="#D3DBEB">Dusun</td>
                                                    <td class="text-dark">xxxxssssssssssssssss</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-semibold" bgcolor="#D3DBEB">Kelurahan</td>
                                                    <td class="text-dark">xxxxssssssssssssssss</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-semibold" bgcolor="#D3DBEB">Kecamatan</td>
                                                    <td class="text-dark">xxxxssssssssssssssss</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-semibold" bgcolor="#D3DBEB">RT</td>
                                                    <td class="text-dark">xxxxssssssssssssssss</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-semibold" bgcolor="#D3DBEB">RW</td>
                                                    <td class="text-dark">xxxxssssssssssssssss</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-semibold" bgcolor="#D3DBEB">Kode Pos</td>
                                                    <td class="text-dark">xxxxssssssssssssssss</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div> --}}
                        </div>
                        <div class="row mt-3 mb-2">
                            <div class="col-lg-5 col-md-9 col-sm-10">
                                <label for="noHP" class="col-form-label text-dark">No. HP</label>
                                <input type="number" class="form-control form-control-sm" id="noHP" name="no_hp"
                                    placeholder="exp. 081224567890">
                            </div>
                            <div class="col-lg-5 col-md-9 col-sm-10">
                                <label for="foto" class="col-form-label text-dark">Foto</label>
                                <input class="form-control form-control-sm" type="file" name="foto">
                            </div>
                        </div>
                        <div class="row mt-3 mb-2">
                            <label for="nis" class="col-form-label text-dark">Nama Orang
                                Tua</label>
                            <div class="col-lg-5 col-md-9 col-sm-10">
                                <input type="text" class="form-control form-control-sm" placeholder="Ayah"
                                    name="ayah">
                            </div>
                            <div class="col-lg-5 col-md-9 col-sm-10">
                                <input type="text" class="form-control form-control-sm" placeholder="Ibu"
                                    name="ibu">
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
