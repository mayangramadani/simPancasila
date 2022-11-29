@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <h4 class="text-primary fw-bold">Data Siswa</h4>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/datasiswa">Data Siswa</a></li>
                <li class="breadcrumb-item active">Tambah Siswa</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Body -->
                    <div class="mt-4 row pl-3">
                        <p class="text-primary">Isilah form berikut dengan data yang benar.</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('datasiswa/add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <img id="blah"
                                        src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
                                        alt="" width="100%" style="object-fit:cover;">
                                    <label for="foto" class="col-form-label text-dark fw-semibold">Foto :</label>
                                    <input id="image-input" class="form-control form-control-md" type="file"
                                        name="foto" onchange="readURL(this);">
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="namaSekolah" class="form-control-label fw-semibold text-dark">Pilih
                                                Sekolah</label>
                                            <select class="form-control form-control-md form-select " name="sekolah_id">
                                                <option>Pilih Sekolah</option>
                                                @foreach ($sekolah as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_sekolah }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-4" style="position: relative">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                                            </div>
                                            <p class="text-primary bg-white px-1 ml-3"
                                                style="position: absolute; top:10px;">
                                                Data
                                                Pribadi</p>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="nis" class="form-control-label fw-semibold text-dark">Nomor
                                                Induk Siswa (NIS)
                                            </label>
                                            <input type="text" class="form-control form-control-md" id="nis"
                                                placeholder="Masukkan NIS" name="nis">
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="nis" class="form-control-label fw-semibold text-dark">Nama
                                                Lengkap Siswa</label>
                                            <input type="text" class="form-control form-control-md" id="nis"
                                                placeholder="Masukkan Nama Siswa" name="nama_siswa">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="namaLengkap" class="form-control-label fw-semibold text-dark">Tempat
                                                Lahir</label>
                                            <input type="text" class="form-control form-control-md" id="tempatLahir"
                                                name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="tanggal" class="form-control-label fw-semibold text-dark">Tanggal
                                                Lahir</label>
                                            <input type="date" class="form-control form-control-md" name="tanggal_lahir">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="agama" class="form-control-label fw-semibold text-dark">Agama
                                            </label>
                                            <select class="form-select form-control form-control-md" name="agama"
                                                aria-label="Default select example">
                                                <option selected disabled>Pilih...</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Hindu">Hindu</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="jk" class="form-control-label fw-semibold text-dark">Jenis
                                                kelamin
                                            </label>
                                            <select class="form-select form-control form-control-md" name="jk"
                                                aria-label="Default select example">
                                                <option selected disabled>Pilih...</option>
                                                <option value="lakilaki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 my-3" style="position: relative">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                                            </div>
                                            <p class="text-primary bg-white px-1 ml-3"
                                                style="position: absolute; top:10px;">
                                                Data
                                                Lainnya</p>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="alamat"
                                                class="col-form-label text-dark fw-semibold">Alamat</label>
                                            <textarea rows="5" type="textarea" class="form-control form-control-md" id="alamat"
                                                placeholder="Masukkan Alamat Lengkap" name="alamat" value></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <label for="namaLengkap"
                                                        class="col-form-label text-dark fw-semibold">RT</label>
                                                    <input type="number" class="form-control form-control-md"
                                                        id="namaLengkap" name="nama_siswa" placeholder="--">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="namaLengkap"
                                                        class="col-form-label text-dark fw-semibold">RW</label>
                                                    <input type="number" class="form-control form-control-md"
                                                        id="namaLengkap" name="nama_siswa" placeholder="--">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="noHP" class="col-form-label text-dark fw-semibold">No
                                                        Telp</label>
                                                    <input type="number" class="form-control form-control-md"
                                                        id="noHP" name="no_hp" placeholder="exp. 081224567890">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="namaLengkap"
                                                class="col-form-label text-dark fw-semibold">Kelurahan</label>
                                            <select name="kelurahan" id="provinsi" class="form-select form-select-md"
                                                required="">
                                                <option disabled="" selected="" value="">Pilih..
                                                </option>
                                                @foreach ($Provinsi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="namaLengkap"
                                                class="col-form-label text-dark fw-semibold">Kecamatan</label>
                                            <select name="kecamatan" id="provinsi" class="form-select form-select-md"
                                                required="">
                                                <option disabled="" selected="" value="">Pilih..
                                                </option>
                                                @foreach ($Provinsi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="namaLengkap"
                                                class="col-form-label text-dark fw-semibold">Kota/Kab</label>
                                            <select name="kota" id="provinsi" class="form-select form-select-md"
                                                required="">
                                                <option disabled="" selected="" value="">Pilih..
                                                </option>
                                                @foreach ($Provinsi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="namaLengkap"
                                                class="col-form-label text-dark fw-semibold">Provinsi</label>
                                            <select name="provinsi" id="provinsi" class="form-select form-select-md"
                                                required="">
                                                <option disabled="" selected="" value="">Pilih..
                                                </option>
                                                @foreach ($Provinsi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 my-3" style="position: relative">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                                            </div>
                                            <p class="text-primary bg-white px-1 ml-3"
                                                style="position: absolute; top:10px;">
                                                Data
                                                Orang Tua</p>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label for="ayah" class="col-form-label text-dark fw-semibold">Nama
                                                Ayah</label>
                                            <input type="text" class="form-control form-control-md"
                                                placeholder="Masukkan Nama Ayah" name="ayah">
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <label for="ibu" class="col-form-label text-dark fw-semibold">Nama
                                                Ibu</label>
                                            <input type="text" class="form-control form-control-md"
                                                placeholder="Masukkan Nama Ibu" name="ibu">
                                        </div>
                                        <div class="col-md-12">
                                            <input class="btn btn-md btn-primary w-100 btn-block" type="submit"
                                                value="SIMPAN DATA" name="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="card-body pl-5">
                        <div class="p-2">
                            <form action="{{ url('datasiswa/add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row mb-4">
                                    <div class="col-md-4">
                                        <label for="namaSekolah"
                                            class="form-control-label fw-semibold text-dark">Sekolah</label>
                                        <select class="form-control form-control-md form-select " name="sekolah_id">
                                            <option>Pilih...</option>
                                            @foreach ($sekolah as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_sekolah }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="nis" class="form-control-label fw-semibold text-dark">NIS
                                            :</label>
                                        <input type="text" class="form-control form-control-md" id="nis"
                                            placeholder="NIS" name="nis">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nis" class="form-control-label fw-semibold text-dark">Nama
                                            Siswa :</label>
                                        <input type="text" class="form-control form-control-md" id="nis"
                                            placeholder="Nama Siswa" name="nama_siswa">
                                    </div>

                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-md-4 me-3">
                                        <label for="agama" class="form-control-label fw-semibold text-dark">Agama <span
                                                class="fs-6 fw-normal text-gray-500">(pilih agama)</span></label>
                                        <select class="form-select form-control form-control-md" name="agama"
                                            aria-label="Default select example">
                                            <option selected>Pilih...</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Hindu">Hindu</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="jenisKelamin" class="col-form-label text-dark fw-semibold">Jenis
                                            Kelamin :</label>
                                        <div class="col-lg-5 col-md-9 col-sm-9">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="inlineRadio1" value="Laki-laki">
                                            <label class="form-check-label form-check form-check-inline"
                                                for="inlineRadio1">Laki-Laki</label>
                                        </div>
                                        <div class="col-lg-5 col-md-9 col-sm-10">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="inlineRadio2" value="Perempuan">
                                            <label class="form-check-label form-check form-check-inline"
                                                for="inlineRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label for="namaLengkap" class="form-control-label fw-semibold text-dark">Tempat
                                            Lahir :</label>
                                        <input type="text" class="form-control form-control-md" id="tempatLahir"
                                            name="tempat_lahir" placeholder="Tempat Lahir">
                                    </div>
                                    <div class="col-md-4 me-2">
                                        <label for="tanggal" class="form-control-label fw-semibold text-dark">Tanggal
                                            Lahir :</label>
                                        <input type="date" class="form-control form-control-md" name="tanggal_lahir">
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-4 col-md-9 col-sm-10">
                                        <label for="alamat" class="col-form-label text-dark fw-bold">Alamat :</label>
                                        <textarea type="textarea" class="form-control form-control-md" id="alamat" placeholder="Jalan" name="alamat"
                                            value></textarea>
                                    </div>
                                    <div class="col-lg-1 col-md-9 col-sm-10">
                                        <label for="namaLengkap" class="col-form-label text-dark">RT:</label>
                                        <input type="number" class="form-control form-control-md" id="namaLengkap"
                                            name="nama_siswa" placeholder="--">
                                    </div>
                                    <div class="col-lg-1 col-md-9 col-sm-10">
                                        <label for="namaLengkap" class="col-form-label text-dark">RW:</label>
                                        <input type="number" class="form-control form-control-md" id="namaLengkap"
                                            name="nama_siswa" placeholder="--">
                                    </div>
                                </div>
                                <div class="row mt-3 mb-5">
                                    <div class="col-lg-2 col-md-9 col-sm-10">
                                        <label for="namaLengkap" class="col-form-label text-dark">Kelurahan:</label>
                                        <select name="kelurahan" id="provinsi" class="form-select form-select-sm"
                                            required="">
                                            <option disabled="" selected="" value="">Pilih..</option>
                                            @foreach ($Provinsi as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-md-9 col-sm-10">
                                        <label for="namaLengkap" class="col-form-label text-dark">Kecamatan:</label>
                                        <select name="kecamatan" id="provinsi" class="form-select form-select-sm"
                                            required="">
                                            <option disabled="" selected="" value="">Pilih..</option>
                                            @foreach ($Provinsi as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-md-9 col-sm-10">
                                        <label for="namaLengkap" class="col-form-label text-dark">Kota/Kab:</label>
                                        <select name="kota" id="provinsi" class="form-select form-select-sm"
                                            required="">
                                            <option disabled="" selected="" value="">Pilih..</option>
                                            @foreach ($Provinsi as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-md-9 col-sm-10">
                                        <label for="namaLengkap" class="col-form-label text-dark">Provinsi:</label>
                                        <select name="provinsi" id="provinsi" class="form-select form-select-sm"
                                            required="">
                                            <option disabled="" selected="" value="">Pilih..</option>
                                            @foreach ($Provinsi as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <select name="provinsi" id="provinsi" class="form-select form-select-sm"
                                                required="">
                                                <option disabled="" selected="" value="">Pilih..</option>
                                                @foreach ($Provinsi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3 mb-2">
                                    <div class="col-lg-3 col-md-9 col-sm-10">
                                        <label for="noHP" class="col-form-label text-dark fw-bold">No. HP :</label>
                                        <input type="number" class="form-control form-control-md" id="noHP"
                                            name="no_hp" placeholder="exp. 081224567890">
                                    </div>
                                    <div class="col-lg-3 col-md-9 col-sm-10">
                                        <label for="foto" class="col-form-label text-dark fw-bold">Foto :</label>
                                        <input class="form-control form-control-md" type="file" name="foto">
                                    </div>
                                </div>
                                <div class="row mt-3 mb-4">
                                    <label for="nis" class="col-form-label text-dark fw-bold">Nama Orang
                                        Tua :</label>
                                    <div class="col-lg-3 col-md-9 col-sm-10">
                                        <input type="text" class="form-control form-control-md" placeholder="Ayah"
                                            name="ayah">
                                    </div>
                                    <div class="col-lg-3 col-md-9 col-sm-10">
                                        <input type="text" class="form-control form-control-md" placeholder="Ibu"
                                            name="ibu">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                                </div>
                            </form>

                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
    @endsection
