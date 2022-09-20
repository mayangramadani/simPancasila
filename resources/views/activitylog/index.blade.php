@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary ">Riwayat Aktivitas</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table1" class="table" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr class="box " role="row">
                                            <th width="5%" class="sorting_asc text-center text-primary" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1"
                                                aria-sort="ascending">No.</th>
                                            <th width="25%" class="sorting text-center text-primary" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">Nama</th>
                                            <th class="sorting text-center text-primary" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">Aktivitas</th>
                                            <th width="20%" class="sorting text-center text-primary" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($aktivitas != null)
                                            @foreach ($aktivitas as $aktivity)
                                                <tr role="row" class="odd">
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">xxx</td>
                                                    <td class="text-center">123</td>
                                                    <td class="text-center">bbb</td>
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
@endsection
