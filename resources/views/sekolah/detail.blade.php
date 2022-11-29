@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="mb-3 btn btn-outline-primary btn-sm">
            <a href="/sekolah">Kembali</a>
        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Sekolah</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="table1" class="table-bordered">
                                        <thead>
                                            <tr class="box bg-primary" role="row">
                                                <th width="4%" class="sorting_1 text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="No.: activate to sort column descending">No.</th>
                                                <th class="text-center text-light" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" name="nama_sekolah"
                                                    aria-label="Nama Pembayaran: activate to sort column ascending">
                                                    Nama Siswa</th>
                                                <th width="25%" class="text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1" name="nis"
                                                    aria-label="Lokasi: activate to sort column ascending">NIS
                                                </th>
                                                <th width="15%" class="text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1" name="derajat"
                                                    aria-label="Derajat: activate to sort column ascending">
                                                    Derajat</th>
                                                <th width="10%" class="text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    name="spp" aria-label="spp: activate to sort column ascending">SPP
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
                                                    <td class="sorting_1 text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $s->nama_siswa }}</td>
                                                    <td class="text-center">{{ $s->nis }}</td>
                                                    <td class="text-center">{{ $s->derajat }}</td>
                                                    <td class="text-center">{{ $s->tanggal_lahir }}</td>                                               
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
