@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Siswa Kelas</h1>
        </div>

        <div class="mb-3">
            <a href="/datakelas">Kembali</a>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary ">Daftar Nama Siswa</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table1" class="table-bordered">
                                    <thead>
                                        <tr class="box bg-teal table-primary" role="row">
                                            <th width="5%" class="sorting_asc text-center text-primary" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1"
                                                aria-sort="ascending">No.</th>
                                            <th width="25%" class="sorting text-center text-primary" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">NIS</th>
                                            <th class="sorting text-center text-primary" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">Nama Lengkap</th>
                                            <th width="20%" class="sorting text-center text-primary" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($AksesKelas != null)
                                            @foreach ($AksesKelas as $ds)
                                                <tr role="row" class="odd">
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $ds->nis }}</td>
                                                    <td class="text-center">{{ $ds->Siswa->nama_siswa }}</td>
                                                    {{-- <td class="text-center">{{ $ds['nama_siswa'] }}</td> --}}
                                                    <td>

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
