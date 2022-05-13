@extends('layouts.main')
@section('container')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="d-sm-mb-0 text-gray-500">Home/Data Siswa/Tambah Data Siswa</h6>
        </div>
            <select class="form-select" aria-label="Default select example">
                <option selected>Daftar Kelas 7</option>
                <option value="1">Kelas 7.1</option>
                <option value="2">Kelas 7.2</option>
                <option value="3">Kelas 7.3</option>
            </select>
            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Siswa</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                              
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>

@endsection