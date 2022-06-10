@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Informasi Sekolah</h1>
        </div>




        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">SMP Sinar Pancasila</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <img class="img-thumbnail mb-4" src="{!! asset('asset/img/logo.png') !!}" alt="">
                            <ul class="list-group">

                                <li class="list-group-item">
                                    <b>Nama Sekolah : </b> SMP DEWANTARA INDONESIA
                                </li>
                                <li class="list-group-item"><b>Alamat : </b>  Telaga Sari Rt.31 No.13, Telaga Sari, Kec. Balikpapan Kota, Kota Balikpapan Prov. Kalimantan Timur</li>
                                <li class="list-group-item"><b>Email : </b> sp@gmail.com</li>
                                <li class="list-group-item"><b>Website : </b> SMP DEWANTARA INDONESIA</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
