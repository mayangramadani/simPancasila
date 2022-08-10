@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit transaksi Pembayaran</h1>
        </div>
        <div class="form-group  mt-4">
            <div class="col-lg-4">
                <form action="/transaksipembayaran/{{ $transaksipembayaran->id }}" method="POST">
                    @method('put')
                    @csrf
                    <label for="cemail" class="control-label">Nama Siswa</label>
                    <select class="form-select form-select-lg mb-3 form-control" name="siswa_id">
                        @foreach ($siswa as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
                        @endforeach
                    </select>

                    <label for="cemail" class="control-label">Kelas</label>
                    <input class="form-control mb-3" type="kelas" name="kelas" placeholder="Kelas"
                        value="{{ $transaksipembayaran->kelas }}">
                    <label for="cemail" class="control-label">Kategori Pembayaran</label>
                    <input class="form-control mb-3" type="text" name="kategori_pembayaran"
                        placeholder="kategori_pembayaran" value="{{ $transaksipembayaran->kredit }}">
                    <label for="cemail" class="control-label">Kategori Pembayaran</label>
                    <select class="form-select form-select-lg mb-3 form-control" name="kategori_pembayaran_id">
                        @foreach ($kategoripembayaran as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_pembayaran }}</option>
                        @endforeach
                    </select>

                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">

                </form>
            </div>
        </div>
    </div>
@endsection
