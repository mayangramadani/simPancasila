@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="pl-3 m-0 font-weight-bold text-primary ">Riwayat Aktivitas</h4>
            </div>
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-3">
                    <!-- Card Header - Dropdown -->


                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table1" class="table-bordered" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr class="box bg-primary " role="row">
                                            <th width="5%" class="sorting_asc text-center text-light" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1"
                                                aria-sort="ascending">No.</th>
                                            <th width="25%" class="sorting text-center text-light" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">Nama</th>
                                            {{-- <th class="sorting text-center text-light" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">Aktivitas</th> --}}
                                            <th width="20%" class="sorting text-center text-light" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aktivitas as $key => $aktivity)
                                            <tr role="row" class="odd">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $aktivity->nama }}</td>
                                                {{-- <td class="text-center">{{ $aktivity->aktivitas }}</td> --}}
                                                <td class="text-center">{{$activity->tanggal}}</td>
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#table1').DataTable();
            });

            $("#pilihSekolah").change(function() {
                console.log($(this).val());
                $.ajax({
                    url: "{{ route('cariSiswa') }}?sekolah=" + $(this).val(),
                    method: 'GET',
                    success: function(data) {
                        console.log("sukses", data);
                        $('#isiTabel').html(data.html);
                    }
                });
            });
        </script>
    @endpush
@endsection
