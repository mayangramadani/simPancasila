@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Data Siswa</h4>
                        <div class="d-flex">
                            <a href="/datasiswa/create"><button class="btn btn-info me-2" type="button"><i
                                        class="fa fa-plus"></i>
                                    Add Siswa</button></a>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Import Excell
                            </button>

                        </div>

                    </div>

                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excell</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('importSiswa') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="cemail" class="control-label">Import</label>
                                        <input class="form-control" type="file" id="formFile" name="file">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table1" class="table-bordered"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr class="box bg-primary" role="row">
                                            <th width="5%" class="sorting_asc text-center text-light" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                                            <th width="25%" class="text-center text-light" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">NIS</th>
                                            <th class="text-center text-light" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">Nama Lengkap</th>
                                            <th width="20%" class="text-center text-light" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $ds)
                                            <tr role="row" class="odd">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $ds->nis }}</td>
                                                <td class="text-center">{{ $ds->nama_siswa }}</td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="/datasiswa/{{ $ds->id }}/detail" id="2"
                                                        class="detail me-2">
                                                        <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-pencil-square"></i>
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#table1').DataTable();
            });
        </script>
    @endpush
@endsection
