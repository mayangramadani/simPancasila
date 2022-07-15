@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Kategori Pembayaran</h1>
        </div>
        <div class="form-group  mt-4">
            <div class="col-lg-4">
                <form action="/kategoripembayaran/{{ $kategoripembayaran->id }}" method="POST">
                    @method('put')
                    @csrf
                    <label for="cemail" class="control-label">Nama Pembayaran</label>
                    <input class="form-control mb-3" type="text" name="nama_pembayaran" placeholder="Nama Pembayaran"
                        value="{{ $kategoripembayaran->nama_pembayaran }}">

                    <label for="cemail" class="control-label">Deskripsi Pembayaran</label>
                    <input class="form-control mb-3" type="text" name="deskripsi_pembayaran"
                        placeholder="Deskripsi Pembayaran" value="{{ $kategoripembayaran->deskripsi_pembayaran }}">

                    <label for="cemail" class="control-label">Harga</label>
                    <input class="form-control mb-3" type="number" name="harga" placeholder="Harga"
                        value="{{ $kategoripembayaran->harga }}">

                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">

                </form>
            </div>
        </div>
    </div>
@endsection
