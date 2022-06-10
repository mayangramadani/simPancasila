@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
       
       <!-- Page Heading -->
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800">Edit Transaksi</h1>
       </div>

       <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="/datakeuangan/{{ $keuangan->id }}" method="POST">
                                @method('put')
                                @csrf
                            <div class="mb-3 row">
                                <label for="transaksi" class="col-sm-2 col-form-label">Jenis Transaksi</label>
                                <div class="col-sm-10">
                                    
                                    <select class="form-select form-select-lg form-control" aria-label="Default select example" name="jenis_transaksi">
                                        <option selected>Jenis</option>
                                        <option value="pemasukan" @if ($keuangan->jenis_transaksi == "pemasukan") selected @endif>Pemasukan</option>
                                        <option value="pengeluaran" @if ($keuangan->jenis_transaksi == "pengeluaran") selected @endif>Pengeluaran</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namaLengkap" class="col-sm-2 col-form-label">Jumlah Transaksi</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="jumlahTransaksi" name="jumlah_transaksi" placeholder="Cth: 100000" value="{{ $keuangan->jumlah_transaksi }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal" value="{{ $keuangan->tanggal }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nis" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ $keuangan->keterangan }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label">Bukti</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="bukti_transaksi" value="{{ $keuangan->bukti_transaksi }}">
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