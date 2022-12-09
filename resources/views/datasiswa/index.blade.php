@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->

    <div class="container-fluid">
        <div class="row">
            <div class="">
                <div class="">
                    <!-- Card Body -->
                    <div class="mt-3 mb-3 d-flex flex-row align-items-center justify-content-between">
                        <div class="d-flex">
                            <label for="namaSekolah" class="col-sm-3 col-form-label text-primary fw-bold">Sekolah: </label>
                            <div class="col-sm-10">
                                <select id="pilihSekolah" class="form-select form-select-lg form-control" name="sekolah_id">
                                    <option>Pilih...</option>
                                    @foreach ($sekolah as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_sekolah }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="/datasiswa/create"><button class="btn btn-info me-2 btn-sm" type="button"><i
                                        class="fa fa-plus"></i>
                                    Add Siswa</button></a>
                            <button type="button" class="btn btn-warning me-2 btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i class="fa fa-file-excel"></i>
                                Import
                            </button>
                            <a href="/datasiswa/export" id="2" class="edit me-2" target="_blank">
                                <button type="button" class="btn btn-danger me-2 btn-sm"><i class="fa fa-file-pdf" ></i>
                                    Export
                                </button></a>

                            {{-- <a href="/datasiswa/export"><button type="button" class="btn btn-danger me-2 btn-sm"><i class="fa fa-file-pdf"></i>
                                Export
                            </button></a> --}}

                            <a href="{{asset('asset/img/template.xlsx')}}" class="btn btn-success me-2 btn-sm"
                                data-bs-target="#exampleModal"><i class="fa fa-file-excel"></i>
                                Template
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    {{-- <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Data Siswa</h4>
                        <div class="d-flex">
                            <a href="/datasiswa/create"><button class="btn btn-info me-2 btn-sm" type="button"><i
                                        class="fa fa-plus"></i>
                                    Add Siswa</button></a>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Import Excell
                            </button>
                        </div>
                    </div> --}}

                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excell</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('importSiswa') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="cemail" class="control-label">Import</label>
                                        <input class="form-control" type="file" id="formFile" name="file">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table1" class="table-bordered" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr class="box bg-primary" role="row">
                                            <th width="5%" class="sorting_asc text-center text-light" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1"
                                                aria-sort="ascending">No.</th>
                                            <th width="25%" class="text-center text-light" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">NIS</th>
                                            <th class="text-center text-light" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Nama Lengkap</th>
                                            <th width="20%" class="text-center text-light" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="isiTabel">
                                        @foreach ($siswa as $ds)
                                            <tr role="row" class="odd">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $ds->nis }}</td>
                                                <td class="text-center">{{ $ds->nama_siswa }}</td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="/datasiswa/{{ $ds->id }}/detail" id="2"
                                                        class="detail me-2" >
                                                        <button class="btn btn-outline-info btn-sm" type="button" title="Detail"><i
                                                                class="fa fa-eye"></i>
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
