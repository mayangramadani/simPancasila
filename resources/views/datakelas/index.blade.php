@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-primary fw-bold" id="exampleModalLabel">Tambah kelas</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/datakelas/add" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="cemail" class="control-label text-dark fw-bold">Sekolah</label>
                            <select class="form-select form-select-lg mb-3 form-control" id="nama_sekolah"
                                name="nama_sekolah">
                                <option>=== Pilih Sekolah ===</option>
                                @foreach ($sekolah as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                                @endforeach
                            </select>
                            <label for="cemail" class="control-label text-dark fw-bold">Tingkatan Kelas</label>
                            <select class="form-select form-select-lg mb-3 form-control" id="tingkatan_kelas"
                                name="tingkatan_kelas">
                                @foreach ($tingkatankelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->tingkatan_kelas }}</option>
                                @endforeach

                            </select>
                            <label for="cemail" class="control-label text-dark fw-bold">Nama Kelas</label>
                            <input class="form-control mb-3" type="text" name="nama_kelas" placeholder="exp. Kelas VI.1">
                            <label for="cemail" class="control-label text-dark fw-bold">kuota</label>
                            <input class="form-control mb-3" type="number" min="0" name="kuota"
                                placeholder="--">
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
            <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="m-0 font-weight-bold text-primary">Daftar Kelas</h4>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>
                    Add Kelas
                </button>
            </div>
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm-sm mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="table1" class="table-bordered" >
                                            <thead>
                                                <tr class="box bg-primary" role="row">
                                                    <th width="5%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="No.: activate to sort column descending">No.</th>
                                                    <th class="text-center text-light" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Nama Sekolah: activate to sort column ascending">
                                                        Tingkatan kelas</th>
                                                    <th class="text-center text-light" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Kelas/Rombel: activate to sort column ascending">
                                                        Kelas</th>
                                                    <th width="20%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">Kuota Siswa
                                                    </th>
                                                    <th width="20%" class="text-center text-light" tabindex="0"
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
                                                        <td class="sorting_1 text-center">{{ $no }}</td>
                                                        <td class="text-center">{{ $dk->TingkatanKelas->tingkatan_kelas }}</td>
                                                        <td class="text-center">{{ $dk->nama_kelas }}</td>
                                                        <td class="text-center">{{ $dk->kuota }}</td>
                                                        <td class="d-flex justify-content-center">
                                                            <a href="/datakelas/{{ $dk->id }}/edit" id="2" title="Edit"
                                                                class="edit me-2">
                                                                <button class="btn btn-outline-success btn-sm" type="button"><i class="fa fa-pencil-square"></i>               
                                                                </button>
                                                            </a>
                                                            <form action="/datakelas/{{ $dk->id }}" method='post'
                                                                class="me-2" title="Delete">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-outline-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i>
                                                                </button>                                                               
                                                            </form>
                                                            <a href="/datakelas/{{ $dk->id }}/detail"
                                                                id="2" class="detail me-2" title="Detail">
                                                                <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-plus"></i>
                                                                </button>
                                                            </a>
                                                            <a href="/datakelas/{{ $dk->id }}/show"
                                                                id="2" class="me-2" title="Show">
                                                                <button class="btn btn-outline-primary btn-sm" type="button"><i class="fa fa-eye"></i>
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
