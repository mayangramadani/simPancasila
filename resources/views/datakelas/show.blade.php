@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h4 class="text-primary fw-bold">Daftar Siswa</h4>
        <div class="d-sm-flex align-items-center justify-content-between">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/datakelas">Data Kelas</a></li>
                    <li class="breadcrumb-item active">Daftar Siswa</li>
                </ol>
            </nav>
            <a href="{{route('exportDataKelas',request()->route()->parameters)}}" id="2" class="edit me-2">
                <button class="btn btn-danger btn-sm" type="button"><i class="fa fa-download"></i>
                    Export
                </button>
            </a>
        </div>


        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table1" class="table table-bordered">
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
