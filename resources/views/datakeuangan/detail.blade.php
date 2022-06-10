@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
       
       <!-- Page Heading -->
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800">Detail Transaksi Keuangan</h1>
       </div>

       <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Detail Data Keuangan</h5>
                        <div class="d-flex">
                            <a href="/datakeuangan/{{ $keuangan->id }}/edit" id="2" class="edit me-2">
                                <button class="btn btn-outline-info" type="button">
                                    Edit                                                                                      
                                </button>                                           
                            </a>	
                            <form action="/datakeuangan/{{ $keuangan->id }}" method='post'>	
                                @csrf	
                                @method('delete')
                                <input class="btn btn-outline-danger" type="submit" value="Hapus">
                            </form>	
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <div class="mb-3 row">
                                <label for="transaksi" class="col-sm-2 col-form-label fw-semibold">Jenis Transaksi</label>
                                <label for="transaksi" class="col-sm-2 col-form-label">: {{ $keuangan->jenis_transaksi }}</label>
                                
                            </div>
                            <div class="mb-3 row">
                                <label for="namaLengkap" class="col-sm-2 col-form-label fw-semibold">Jumlah Transaksi</label>
                                <label for="namaLengkap" class="col-sm-2 col-form-label">: {{ $keuangan->jumlah_transaksi }}</label>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-2 col-form-label fw-semibold">Tanggal Transaksi</label>
                                <label for="tanggal" class="col-sm-2 col-form-label">: {{ $keuangan->tanggal }}</label>
                            </div>
                            <div class="mb-3 row">
                                <label for="nis" class="col-sm-2 col-form-label fw-semibold">Keterangan</label>
                                <label for="nis" class="col-sm-2 col-form-label">: {{ $keuangan->keterangan }}</label>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label fw-semibold">Bukti</label>
                                <label for="foto" class="col-sm-2 col-form-label">: {{ $keuangan->bukti_transaksi }}</label>
                            </div>

                            <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection