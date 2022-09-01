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
                            <label for="cemail" class="control-label">Sekolah</label>
                            <select class="form-select form-select-lg mb-3 form-control" id="nama_sekolah"
                                name="nama_sekolah">
                                @foreach ($sekolah as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                                @endforeach
                            </select>
                            <label for="cemail" class="control-label">Tingkatan Kelas</label>
                            <select class="form-select form-select-lg mb-3 form-control" id="tingkatan_kelas"
                                name="tingkatan_kelas">
                                @foreach ($tingkatankelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->tingkatan_kelas }}</option>
                                @endforeach

                            </select>
                            <label for="cemail" class="control-label">Nama Kelas</label>
                            <input class="form-control mb-3" type="text" name="nama_kelas" placeholder="Nama Kelas">

                            {{-- <label for="cemail" class="control-label">Tingkatan Kelas</label>
                            <select class="form-select form-select-lg mb-3 form-control" name="tingkatan_kelas_id">
                                @foreach ($tingkatankelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_tingkatan }}</option>
                                @endforeach
                            </select> --}}

                            <label for="cemail" class="control-label">kuota</label>
                            <input class="form-control mb-3" type="number" min="0" name="kuota"
                                placeholder="kuota">
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
                                    <div class="table-responsive">
                                        <table id="table1" class="table datatable table-bordered table-hover no-footer">
                                            <thead>
                                                <tr class="box bg-teal" role="row">
                                                    <th width="5%" class="sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="No.: activate to sort column descending">No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Nama Sekolah: activate to sort column ascending">
                                                        Tingkatan kelas</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Kelas/Rombel: activate to sort column ascending">
                                                        Kelas</th>
                                                    {{-- <th width="25%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Tingkat Kelas: activate to sort column ascending">
                                                        Tingkat
                                                        Kelas</th> --}}
                                                    <th width="20%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">Jumlah Siswa
                                                    </th>
                                                    <th width="20%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
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
                                                        <td>{{ $dk->TingkatanKelas->tingkatan_kelas }}</td>
                                                        <td>{{ $dk->nama_kelas }}</td>
                                                        <td>{{ $dk->kuota }}</td>
                                                        <td class="d-flex">
                                                            <a href="/datakelas/{{ $dk->id }}/edit" id="2"
                                                                class="edit me-2">
                                                                <button class="btn btn-outline-info" type="button">
                                                                    Edit
                                                                </button>
                                                            </a>
                                                            <form action="/datakelas/{{ $dk->id }}" method='post'
                                                                class="me-2">
                                                                @csrf
                                                                @method('delete')
                                                                <input class="btn btn-outline-danger" type="submit"
                                                                    value="Hapus">
                                                            </form>

                                                            <a href="/datakelas/{{ $dk->id }}/detail"
                                                                id="2" class="detail me-2">
                                                                <button class="btn btn-outline-primary" type="button">
                                                                    Add
                                                                </button>
                                                            </a>
                                                            <a href="/datakelas/{{ $dk->id }}/show"
                                                                id="2" class="me-2">
                                                                <button class="btn btn-outline-primary" type="button">
                                                                    Show
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
        </div>
    </div>
    @push('scripts')
        <script>
            $('#nama_sekolah').change(function() {
                var id = $(this).val();
                console.log('nama_sekolah', id)
                if (id) {
                    $.ajax({
                        type: "GET",
                        url: "getTingkatanKelas?kelas=" + id,
                        dataType: 'JSON',
                        success: function(res) {
                            console.log(res);
                            if (res) {
                                $("#tingkatan_kelas").empty();
                                $("#tingkatan_kelas").append(
                                    '<option>---Pilih tingkatan_kelas---</option>');
                                $.each(res, function(nama, kode) {
                                    console.log(kode)
                                    $("#tingkatan_kelas").append('<option value="' + kode.id +
                                        '">' + kode
                                        .tingkatan_kelas +
                                        '</option>');
                                });
                            } else {
                                $("#tingkatan_kelas").empty();
                            }
                        }
                    });
                } else {
                    $("#kelurahan").empty();
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                console.log('asdas');
                $('#table1').DataTable();
            });
        </script>
    @endpush
@endsection
