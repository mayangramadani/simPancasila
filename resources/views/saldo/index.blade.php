@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Saldo</h1>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Saldo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Saldo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/saldo/add" method="POST">
                        @csrf
                        <div class="modal-body">

                            <label for="cemail" class="control-label">Sekolah</label>
                            <select class="form-select form-select-lg form-control" name="sekolah_id">
                                <option>=== Pilih Sekolah ===</option>
                                @foreach ($sekolah as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_sekolah }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="cemail" class="control-label">Debit</label>
                            <input class="form-control mb-3" type="number" name="debit" placeholder="Debit">

                            <label for="cemail" class="control-label">Kredit</label>
                            <input class="form-control mb-3" type="number" name="kredit" placeholder="Kredit">

                            <label for="cemail" class="control-label">Saldo</label>
                            <input class="form-control mb-3" type="number" min="0" name="saldo"
                                placeholder="Saldo">
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
                        <h6 class="m-0 font-weight-bold text-primary">Kelas</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="table1" class="table datatable table-bordered table-hover no-footer">
                                            <thead>
                                                <tr class="box bg-teal" role="row">
                                                    <th width="5%" class="sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="No.: activate to sort column descending">No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="sekolah: activate to sort column ascending">
                                                        Sekolah</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Debit: activate to sort column ascending">
                                                        Debit</th>
                                                    <th width="25%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Kredit: activate to sort column ascending">
                                                        Kredit</th>
                                                    <th width="20%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Saldo: activate to sort column ascending">Saldo
                                                    </th>
                                                    <th width="20%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @php
                                                    $no = 0;
                                                @endphp
                                                @foreach ($saldo as $s)
                                                    @php
                                                        $no++;
                                                    @endphp
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{ $no }}</td>
                                                        <td>{{ $s->sekolah->nama_sekolah }}</td>
                                                        <td>{{ $s->debit }}</td>
                                                        <td>{{ $s->kredit }}</td>
                                                        <td>{{ $s->saldo }}</td>
                                                        <td class="d-flex">
                                                            <a href="/saldo/{{ $s->id }}/edit" id="2"
                                                                class="edit me-2">
                                                                <button class="btn btn-outline-info" type="button">
                                                                    Edit
                                                                </button>
                                                            </a>
                                                            <form action="/saldo/{{ $s->id }}" method='post'>
                                                                @csrf
                                                                @method('delete')
                                                                <input class="btn btn-outline-danger" type="submit"
                                                                    value="Hapus">
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
