@extends('layouts.main')
@section('container')
    <div class="container-fluid">
     <!-- Begin Page Content -->
     <div class="container-fluid">
        
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="d-sm-mb-0 text-gray-500">Home/Form Pembayaran/Konfirmasi</h6>
        </div>
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Pembayaran</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <h6 class="m-0 font-weight text-sekunder mb-2">Jenis Pembayaran</h6>
                            <select class="form-select form-select-lg mb-3 form-control" aria-label="Default select example">
                                <option selected>select</option>
                                <option value="1">Pembayaran SPP</option>
                                <option value="2">Pembayaran Buku</option>
                                <option value="3">Pembayaran Seragam</option>
                              </select>
                              <h6 class="m-0 font-weight text-sekunder mb-2">Jumlah Pembayaran</h6>
                            <div class="input-group flex-nowrap mb-3">
                                <input type="text" class="form-control" placeholder="cth:100000" aria-label="jumlah pembayaran" aria-describedby="addon-wrapping">
                              </div>
                              <h6 class="m-0 font-weight text-sekunder mb-2">Tanggal</h6>
                              <input type="text" class="datepicker form-control mb-3" placeholder="mm/dd/yyyy">
                              
                              <a href="#"><button class="btn btn-primary" type="button">Bayar</button></a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
        <script type="text/javascript">
            $('.datepicker').datepicker();
            </script>

@endsection