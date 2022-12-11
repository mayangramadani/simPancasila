@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="mb-3 btn-sm btn-outline-primary btn">
            <a href="/datasiswa">Kembali</a>
        </div>


        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
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
                        <div class="row">
                            <div class="col-md-3">
                                <label for="foto" class="col-form-label text-dark fw-semibold">Foto Siswa</label>
                                <img id="blah"
                                src="{{ asset('storage/DataSiswa/Foto/' . $siswa->foto) }}"
                                    {{-- src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png" --}}
                                    alt="" width="100%" style="object-fit:cover;">
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12 mb-4" style="position: relative">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                                        </div>
                                        <p class="text-primary bg-white px-1 ml-3" style="position: absolute; top:10px;">
                                            Data
                                            Pribadi</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="nis" class="form-control-label fw-semibold text-dark">Nomor
                                            Induk Siswa (NIS)
                                        </label>
                                        <input disabled value="{{ $siswa->nis }}" type="text"
                                            class="form-control form-control-md" id="nis" placeholder="Masukkan NIS"
                                            name="nis">
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="nis" class="form-control-label fw-semibold text-dark">Nama
                                            Lengkap Siswa</label>
                                        <input disabled value="{{ $siswa->nama_siswa }}" type="text"
                                            class="form-control form-control-md" id="nis"
                                            placeholder="Masukkan Nama Siswa" name="nama_siswa">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="namaLengkap" class="form-control-label fw-semibold text-dark">Tempat
                                            Lahir</label>
                                        <input disabled value="{{ $siswa->tempat_lahir }}" type="text"
                                            class="form-control form-control-md" id="tempatLahir" name="tempat_lahir"
                                            placeholder="Masukkan Tempat Lahir">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="tanggal" class="form-control-label fw-semibold text-dark">Tanggal
                                            Lahir</label>
                                        <input disabled value="{{ $siswa->tanggal_lahir }}" type="date"
                                            class="form-control form-control-md" name="tanggal_lahir">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="agama" class="form-control-label fw-semibold text-dark">Agama
                                        </label>
                                        <input disabled value="{{ $siswa->agama }}" type="text"
                                            class="form-control form-control-md" id="tempatLahir" name="agama"
                                            placeholder="Masukkan Tempat Lahir">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="jk" class="form-control-label fw-semibold text-dark">Jenis
                                            kelamin
                                        </label>
                                        <input disabled value="{{ $siswa->jenis_kelamin }}" type="text"
                                            class="form-control form-control-md" id="tempatLahir" name="jeniskelamin"
                                            placeholder="Masukkan Tempat Lahir">
                                    </div>
                                    <div class="col-md-12 my-3" style="position: relative">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                                        </div>
                                        <p class="text-primary bg-white px-1 ml-3" style="position: absolute; top:10px;">
                                            Data
                                            Lainnya</p>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="alamat" class="col-form-label text-dark fw-semibold">Alamat</label>
                                        <textarea disabled rows="5" type="textarea" class="form-control form-control-md" id="alamat"
                                            placeholder="Masukkan Alamat Lengkap" name="alamat" value>{{ $siswa->alamat }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="namaLengkap"
                                                    class="col-form-label text-dark fw-semibold">RT</label>
                                                <input disabled type="number" class="form-control form-control-md"
                                                    id="namaLengkap" name="nama_siswa" placeholder="--">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="namaLengkap"
                                                    class="col-form-label text-dark fw-semibold">RW</label>
                                                <input disabled type="number" class="form-control form-control-md"
                                                    id="namaLengkap" name="nama_siswa" placeholder="--">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="noHP" class="col-form-label text-dark fw-semibold">No
                                                    Telp</label>
                                                <input disabled value="{{ $siswa->no_hp }}" type="number"
                                                    class="form-control form-control-md" id="noHP" name="no_hp"
                                                    placeholder="exp. 081224567890">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="namaLengkap"
                                            class="col-form-label text-dark fw-semibold">Kelurahan</label>
                                            <input disabled value="{{ $siswa->kelurahan }}" type="text"
                                            class="form-control form-control-md" id="keluarahan" name="kelurahan">

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="namaLengkap"
                                            class="col-form-label text-dark fw-semibold">Kecamatan</label>
                                            <input disabled value="{{ $siswa->kecamatan }}" type="text"
                                            class="form-control form-control-md" id="kecamatan" name="kecamatan">

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="namaLengkap"
                                            class="col-form-label text-dark fw-semibold">Kota/Kab</label>
                                            <input disabled value="{{ $siswa->kota }}" type="text"
                                            class="form-control form-control-md" id="kota" name="kota">

                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="namaLengkap"
                                            class="col-form-label text-dark fw-semibold">Provinsi</label>
                                            <input disabled value="{{ $siswa->provinsi }}" type="text"
                                            class="form-control form-control-md" id="provinsi" name="provinsi">

                                    </div>
                                    <div class="col-md-12 my-3" style="position: relative">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                                        </div>
                                        <p class="text-primary bg-white px-1 ml-3" style="position: absolute; top:10px;">
                                            Data
                                            Orang Tua</p>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label for="ayah" class="col-form-label text-dark fw-semibold">Nama
                                            Ayah</label>
                                        <input disabled value="{{ $siswa->ayah }}" type="text"
                                            class="form-control form-control-md" placeholder="Masukkan Nama Ayah"
                                            name="ayah">
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label for="ibu" class="col-form-label text-dark fw-semibold">Nama
                                            Ibu</label>
                                        <input disabled value="{{ $siswa->ibu }}" type="text"
                                            class="form-control form-control-md" placeholder="Masukkan Nama Ibu"
                                            name="ibu">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="p-3">
                            <div class="row">
                                <label for="nis" class="col-sm-2 col-form-label fw-semibold text-dark">NIS</label>
                                <label for="nis" class="col-sm-5 form-control text-dark"
                                    readonly>{{ $siswa->nis }}</label>
                            </div>
                            <div class="row">
                                <label for="namaLengkap" class="col-sm-2 col-form-label fw-semibold text-dark">Nama
                                    Lengkap</label>
                                <label for="namaLengkap" class="col-sm-5 form-control text-dark" readonly>
                                    {{ $siswa->nama_siswa }}</label>
                            </div>
                            <div class="row">
                                <label for="namaLengkap" class="col-sm-2 col-form-label fw-semibold text-dark">Tempat
                                    Lahir</label>
                                <label for="namaLengkap" class="col-sm-5 form-control text-dark" readonly>
                                    {{ $siswa->tempat_lahir }}</label>
                            </div>
                            <div class="row">
                                <label for="tanggal"
                                    class="col-sm-2 col-form-label fw-semibold text-dark">Tanggal</label>
                                <label for="tanggal" class="col-sm-5 form-control text-dark"
                                    readonly>{{ $siswa->tanggal_lahir }}</label>
                            </div>
                            <div class="row">
                                <label for="jenisKelamin" class="col-sm-2 col-form-label fw-semibold text-dark">Jenis
                                    Kelamin</label>
                                <label for="jenisKelamin" class="col-sm-5 form-control text-dark" readonly>
                                    {{ $siswa->jenis_kelamin }}</label>
                            </div>
                            <div class="row">
                                <label for="agama" class="col-sm-2 col-form-label fw-semibold text-dark">Agama</label>
                                <label for="agama" class="col-sm-5 form-control text-dark"
                                    readonly>{{ $siswa->agama }}</label>
                            </div>
                            <div class="row">
                                <label for="alamat" class="col-sm-2 col-form-label fw-semibold text-dark">Alamat</label>
                                <label for="alamat" class="col-sm-5 form-control text-dark"
                                    readonly>{{ $siswa->alamat }}</label>
                            </div>
                            <div class="row">
                                <label for="noHP" class="col-sm-2 col-form-label fw-semibold text-dark">No. HP</label>
                                <label for="noHP" class="col-sm-5 form-control text-dark"
                                    readonly>{{ $siswa->no_hp }}</label>
                            </div>
                            <div class="row">
                                <label for="foto" class="col-sm-2 col-form-label fw-semibold text-dark">Foto</label>
                                <label for="foto" class="col-sm-5 form-control text-dark"
                                    readonly>{{ $siswa->foto }}
                                </label>

                            </div>
                            <div class="row">
                                <label for="nis" class="col-sm-2 col-form-label fw-semibold text-dark">Nama
                                    Ayah</label>
                                <label for="nis" class="col-sm-5 form-control text-dark"
                                    readonly>{{ $siswa->ayah }}</label>
                            </div>
                            <div class="row">
                                <label for="nis" class="col-sm-2 col-form-label fw-semibold text-dark">Nama
                                    Ibu</label>
                                <label for="nis" class="col-sm-5 form-control text-dark"
                                    readonly>{{ $siswa->ibu }}</label>
                            </div>

                        </div> --}}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
