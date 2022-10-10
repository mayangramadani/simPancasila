@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Kelas</h1>
        </div>


        <div class="mb-3">
            <a href="/datakelas">Kembali</a>
        </div>


        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary ">Daftar Nama Siswa</h6>
                            <div class="d-flex">
                                {{-- <a href="/datakelas/{{ $datakelas->id }}/edit" id="2" class="edit me-2">
                                    <button class="btn btn-outline-info" type="button">
                                        Edit
                                    </button>
                                </a>
                                <form action="/datakelas/{{ $datakelas->id }}" method='post'>
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-outline-danger" type="submit" value="Hapus">
                                </form> --}}
                            </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table1" class="table table-bordered" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr class="box bg-primary" role="row">
                                            <th width="5%" class="sorting_asc text-center text-light" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1"
                                                aria-sort="ascending">No.</th>
                                            <th width="25%" class="sorting text-center text-light" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">NIS</th>
                                            <th class="sorting text-center text-light" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">Nama Lengkap</th>
                                            <th width="20%" class="sorting text-center text-light" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($dataku != null)
                                            @foreach ($dataku as $ds)
                                                <tr role="row" class="odd">
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $ds['nis'] }}</td>
                                                    <td class="text-center">{{ $ds['nama_siswa'] }}</td>
                                                    {{-- <td>{{ $ds->DataKelas->nama_kelas }}</td> --}}
                                                    <td class="d-flex justify-content-center">
                                                        <form action="{{ url('/akseskelas/add') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $ds['id'] }}"
                                                                name="siswa_id">
                                                            <input type="hidden" value="{{ $datakelas->id }}"
                                                                name="kelas_id">
                                                            <button class="btn btn-outline-info btn-sm" type="submit"><i
                                                                    class="fa fa-plus"></i>
                                                                Add Siswa
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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
