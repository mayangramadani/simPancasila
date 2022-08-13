@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sekolah</h1>
        </div>

        <div class="mb-3">
            <a href="/sekolah">Kembali</a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sekolah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/sekolah/add" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="cemail" class="control-label">Nama Sekolah</label>
                            <input class="form-control mb-3" type="text" name="nama_sekolah" placeholder="Nama Sekolah">

                            <label for="cemail" class="control-label">Derajat</label>
                            <input class="form-control mb-3" type="text" name="derajat" placeholder="Derajat">

                            <label for="cemail" class="control-label">Lokasi</label>
                            <input class="form-control mb-3" type="text" name="lokasi" placeholder="Lokasi">

                            <label for="cemail" class="control-label">SPP</label>
                            <input class="form-control mb-3" type="number" name="spp" placeholder="spp">

                            <label for="cemail" class="control-label">Tingkatan Kelas</label>
                            <input class="form-control mb-3" type="text" name="tingkatan_kelas"
                                placeholder="Tingkatan Kelas">

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
                        <h6 class="m-0 font-weight-bold text-primary">Sekolah</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="table1" class="table datatable table-bordered table-hover no-footer">
                                        <thead>
                                            <tr class="box bg-teal" role="row">
                                                <th width="4%" class="sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="No.: activate to sort column descending">No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" name="nama_sekolah"
                                                    aria-label="Nama Pembayaran: activate to sort column ascending">
                                                    Nama Siswa</th>
                                                <th width="8%" class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" name="derajat"
                                                    aria-label="Derajat: activate to sort column ascending">
                                                    Derajat</th>
                                                <th width="25%" class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" name="lokasi"
                                                    aria-label="Lokasi: activate to sort column ascending">Lokasi
                                                </th>
                                                <th width="10%" class="sorting" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    name="spp" aria-label="spp: activate to sort column ascending">SPP
                                                </th>
                                                <th width="15%" class="sorting" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    name="tingkatan_kelas"
                                                    aria-label="tingkatan_kelas: activate to sort column ascending">
                                                    Tingkat Kelas
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                                $no = 0;
                                            @endphp
                                            @foreach ($siswa as $s)
                                                @php
                                                    $no++;
                                                @endphp
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $no }}</td>
                                                    <td>{{ $s->nama_siswa }}</td>
                                                    <td>{{ $s->nis }}</td>
                                                    <td>{{ $s->tempat_lahir }}</td>
                                                    <td>{{ $s->tanggal_lahir }}</td>
                                                    <td>{{ $s->tingkatan_kelas }}</td>
                                                    {{-- <td class="d-flex">
                                                        {{-- <a href="/sekolah/{{ $s->id }}/edit" id="2"
                                                            class="edit me-2">
                                                            <button class="btn btn-outline-info" type="button">
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <form action="/sekolah/{{ $s->id }}" method='post'
                                                            class="me-2">
                                                            @csrf
                                                            @method('delete')
                                                            <input class="btn btn-outline-danger" type="submit"
                                                                value="Hapus">
                                                        </form>

                                                        <a href="/sekolah/{{ $s->id }}/detail" id="2"
                                                            class="detail me-2">
                                                            <button class="btn btn-outline-primary" type="button">
                                                                Show
                                                            </button>
                                                        </a> --}}
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                console.log('asdas');
                $('#table1').DataTable();
            });
        </script>
    @endpush
@endsection
