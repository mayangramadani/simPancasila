@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Kelas
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/datakelas/add" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="cemail" class="control-label">Nama Kelas</label>
                            <input class="form-control mb-3" type="text" name="nama_kelas" placeholder="Nama Kelas">

                            <label for="cemail" class="control-label">Tingkatan Kelas</label>
                            <select class="form-select form-select-lg mb-5 form-control" name="tingkatan_kelas">
                                <option value="Kelas 7">Kelas 7</option>
                                <option value="Kelas 8">Kelas 8</option>
                                <option value="Kelas 9">Kelas 9</option>
                                <option value="Ekstrakurikuler">Ekstrakurikuler</option>
                                <option value="Bimbel">Bimbel</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kelas</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-hover dataTable no-footer"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr class="box bg-teal" role="row">
                                                <th width="5%" class="sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="No.: activate to sort column descending">No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Kelas/Rombel: activate to sort column ascending">
                                                    Kelas/Rombel</th>
                                                <th width="25%" class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Tingkat Kelas: activate to sort column ascending">Tingkat
                                                    Kelas</th>
                                                <th width="20%" class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Jumlah Siswa</th>
                                                <th width="20%" class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                                $no = 0;
                                            @endphp
                                            @foreach ($datakelas as $dk)
                                                @php
                                                    $no++;
                                                @endphp
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $no }}</td>
                                                    <td>{{ $dk->nama_kelas }}</td>
                                                    <td>{{ $dk->tingkatan_kelas }}</td>
                                                    <td>{{ $dk->total }}</td>
                                                    <td class="d-flex">
                                                        <a href="/datakelas/{{ $dk->id }}/edit" id="2"
                                                            class="edit me-2">
                                                            <button class="btn btn-outline-info" type="button">
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <form action="/datakelas/{{ $dk->id }}" method='post'>
                                                            @csrf
                                                            @method('delete')
                                                            <input class="btn btn-outline-danger" type="submit"
                                                                value="Hapus">
                                                        </form>
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
    </div>
    </div>
@endsection
