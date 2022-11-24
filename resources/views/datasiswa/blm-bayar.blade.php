@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->

    <div class="container-fluid">
        <div class="d-flex flex-row align-items-center justify-content-between mb-2 py-3 pl-3">
            <h4 class="m-0 font-weight-bold text-primary mb-7">Daftar Siswa yang Belum Bayar

            </h4>

        </div>
        <!-- Card Body -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table1" class="table-bordered" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr class="box bg-primary" role="row">
                                        <th width="5%" class="sorting_asc text-center text-light" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.
                                        </th>
                                        <th width="35%" class="text-center text-light" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1">Nama Siswa</th>
                                        <th class="text-center text-light" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1">Bulan</th>
                                        <th width="20%" class="text-center text-light" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="isiTabel">
                                    @foreach ($siswa->where('status_pembayaran', 'Belum Dibayar') as $ds)
                                        <tr role="row" class="odd">
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $ds->User->name }}</td>
                                            <td class="text-center">{{ $ds->nama_keuangan }}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="/datasiswa/{{ $ds->id }}/detail" id="2"
                                                    class="detail me-2">
                                                    <button class="btn btn-outline-info btn-sm" type="button"
                                                        title="Detail"><i class="fa fa-eye"></i>
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
