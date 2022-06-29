@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
            
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Konfirmasi Pembayaran</h1>
        </div>

        
        <div class="mb-5">
        {{ Breadcrumbs::render('konfirmasi') }}
        </div>


        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Pembayaran</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <div class="mb-3 row">
                                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                <div class="col-sm-10">
                                    <label for="nis" class="col-form-label text-dark">: 17283940</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <label for="namaLeng" class="col-form-label text-dark">: Mayang Ramadani</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenisPembayaran" class="col-sm-2 col-form-label">Jenis Pembayaran</label>
                                <div class="col-sm-10">
                                    <label for="jenisByr" class="col-form-label text-dark">: Pembayaran SPP</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jumlahPembayaran" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <label for="jumlah" class="col-form-label text-dark">: Rp150000</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <label for="tgl" class="col-form-label text-dark">: 21/05/2022</label>
                                </div>
                            </div>

                        
        
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection