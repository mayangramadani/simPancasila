@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Akses Kelas</h1>
        </div> --}}

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Akses kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/akseskelas/add" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="cemail" class="control-label">Nama Siswa</label>
                            <select class="form-select form-select-lg mb-3 form-control" name="siswa_id">
                                @foreach ($siswa as $ni)
                                    <option value="{{ $ni->id }}">{{ $ni->nama_siswa }}</option>
                                @endforeach
                            </select>

                            <label for="cemail" class="control-label">Nama Kelas</label>
                            <select class="form-select form-select-lg mb-3 form-control" name="kelas_id">
                                @foreach ($datakelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <label for="cemail" class="control-label">Tahun</label>
                            <input class="form-control mb-3" type="number" name="tahun" placeholder="Tahun">

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
                        <h5 class="m-0 font-weight-bold text-primary">Akses Kelas</h5>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add
                        </button>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="table1" class="table-bordered">
                                            <thead>
                                                <tr class="box bg-primary" role="row">
                                                    <th width="5%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="No.: activate to sort column descending">No.</th>
                                                    <th class="text-center text-light" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Kelas/Rombel: activate to sort column ascending">
                                                        Nama Siswa</th>
                                                    <th width="25%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Tingkat Kelas: activate to sort column ascending">
                                                        Nama Kelas</th>
                                                    <th width="25%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Tahun: activate to sort column ascending">
                                                        Tahun</th>
                                                    <th width="25%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">
                                                        Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @php
                                                    $no = 0;
                                                @endphp
                                                @foreach ($akseskelas as $ak)
                                                    @php
                                                        $no++;
                                                    @endphp
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1 text-center">{{ $no }}</td>
                                                        <td class="text-center">{{ $ak->Siswa->nama_siswa }}</td>
                                                        <td class="text-center">{{ $ak->DataKelas->nama_kelas }}</td>
                                                        <td class="text-center">{{ $ak->tahun }}</td>
                                                        <td class="d-flex justify-content-center">
                                                            <a href="/akseskelas/{{ $ak->id }}/edit" id="2"
                                                                class="edit me-2">
                                                                <button class="btn btn-outline-info btn-sm"
                                                                    type="button"><i class="fa fa-pencil-square" title="Edit"></i>
                                                                    
                                                                </button>
                                                            </a>
                                                            <form action="/akseskelas/{{ $ak->id }}" method='post' title="Hapus">
                                                                @csrf
                                                                @method('delete')
                                                                {{-- <input class="btn btn-outline-danger btn-sm"
                                                                    type="submit" value="Hapus"> --}}
                                                                <button class="btn btn-outline-danger btn-sm"
                                                                    type="submit"><i class="fas fa-trash-alt"></i>
                                                                </button>
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                console.log('asdas');
                $('#table1').DataTable();
            });
        </script>
    @endpush
@endsection
