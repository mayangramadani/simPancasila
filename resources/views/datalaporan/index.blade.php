@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Semester</h1>
        </div>
        <div class="form-group  mt-4">
            <div class="col-lg-4">
                <form action="/datalaporan/add" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-10">
                            <label for="cemail" class="control-label">Semester</label>
                            <select class="form-select form-select-lg mb-3 form-control" name="">
                                <option selected>Pilih...</option>
                                <option value="semester ganjil">Semester Ganjil</option>
                                <option value="semester genap">Semester Genap</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-10">
                            <label for="cemail" class="control-label">Tahun Ajaran</label>
                            <select class="form-select form-select-lg mb-3 form-control" name="">
                                <option selected>Pilih...</option>
                                <option value="2020/2021">2020/2021</option>
                                <option value="2021/2022">2021/2022</option>
                                <option value="2022/2023">2022/2023</option>
                            </select>
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                    <input class="btn btn-danger" type="submit" value="Cetak" name="submit">
                    <a href="/datalaporan/show" id="2" class="edit me-2">
                        <button class="btn btn-info" type="button"><i class="fa fa-eye"></i>
                            Show
                        </button>
                    </a>

                </form>
            </div>
        </div>
        {{-- <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Semester</h6>
                    </div>

                </div>
            </div>
        </div> --}}
    </div>
    </div>
@endsection
