@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
        </div>
        {{-- {{ $siswa->DataKelas->nama_kelas }} --}}
        <div class="mb-4 row g-3">
            <label>Search:
                <input type="search" class="form-control input-sm col-xl-3" placeholder="" aria-controls="example1">
            </label>
            <div class="col-sm-10">
                {{-- <select class="form-select form-select-lg form-control" aria-label="Default select example">
                    <option selected>Daftar Kelas 7</option>
                    <option value="1">Kelas 7.1</option>
                    <option value="2">Kelas 7.2</option>
                    <option value="3">Kelas 7.3</option>
                </select> --}}
                <select class="form-select form-select-lg form-control" aria-label="Default select example" name="nama_kelas"
                    required>
                    <option selected disabled value="">Pilih..</option>
                    @foreach ($siswa as $item)
                        <option value="{{ $item->id }}">{{ $item->nis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <a href="/datasiswa/create"><button class="btn btn-primary" type="button"><i class="fa fa-plus"></i>
                        Tambah Siswa</button></a>
            </div>

        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                        <div class="d-flex">
                            <a href="#" id="2" class="edit me-2">
                                <button class="btn btn-outline-danger" type="button">
                                    Import Excell
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-hover dataTable no-footer"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr class="box bg-teal" role="row">
                                            <th width="5%" class="sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                                            <th width="25%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">NIS</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">Nama Lengkap</th>
                                            <th width="20%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $ds)
                                            <tr role="row" class="odd">

                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ds->nis }}</td>
                                                <td>{{ $ds->nama_siswa }}</td>
                                                {{-- <td>{{ $ds->DataKelas->nama_kelas }}</td> --}}
                                                <td class="d-flex">
                                                    <a href="/datasiswa/{{ $ds->id }}/detail" id="2"
                                                        class="detail me-2">
                                                        <button class="btn btn-outline-info" type="button">
                                                            Detail
                                                        </button>
                                                    </a>

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
