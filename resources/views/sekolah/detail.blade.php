@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-flex flex-row align-items-center justify-content-center py-3">
            <h3 class="m-0 font-weight-bold text-primary mb-7">Daftar Siswa
            </h3>
        </div>
        <p class="mb-5 text-center">Daftar siswa yang berada pada sekolah <span
                class="fw-bold text-dark">{{ $sekolah->nama_sekolah }},</span> klik <a href="/sekolah">Sekolah</a> jika ingin
            kembali ke halaman sekolah </p>

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->

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
                                                    aria-controls="example1" rowspan="1" colspan="1" name="sekolah"
                                                    aria-label="Derajat: activate to sort column ascending">
                                                    Sekolah</th>
                                                <th width="10%" class="text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1" name="status"
                                                    aria-label="spp: activate to sort column ascending">Status
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
                                                    <td class="text-center">{{ $s->Sekolah->nama_sekolah }}</td>
                                                    {{-- <td class="text-center">{{$s->isActive}}</td>   --}}
                                                    <td class="text-center">
                                                        @if ($s->isActive)
                                                            <span class="badge bg-success">Aktif</span>
                                                        @else
                                                            <span class="badge bg-danger">Non Aktif</span>
                                                        @endif
                                                    </td>
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
