@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Tahunan</h1>
        </div>
        <div class="form-group  mt-4">
            <div class="col-lg-4">
                <form action="/datakelas/add" method="POST">
                    @csrf

                    <label for="cemail" class="control-label">Tahun Ajaran</label>
                    <select class="form-select form-select-lg mb-3 form-control" name="laporan_tahunan">
                        <option selected>--Pilih Tahun Ajaran--</option>
                        <option value="2020/2021">2020/2021</option>
                        <option value="2021/2022">2021/2022</option>
                        <option value="2022/2023">2022/2023</option>
                    </select>
                    <input class="btn btn-outline-info" type="submit" value="Tampilkan" name="submit">
                    <input class="btn btn-danger" type="submit" value="Cetak" name="submit">

                </form>
            </div>

        </div>



        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Tahunan</h6>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
