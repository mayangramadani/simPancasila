@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('sweetalert::alert')
        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kategori Keuangan</h1>
        </div> --}}

        <!-- Button trigger modal -->
       
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary fw-bold" id="exampleModalLabel">Kategori Keuangan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/kategorikeuangan/add" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="cemail" class="control-label fw-bold text-dark">Nama Keuangan</label>
                            <input class="form-control mb-3" type="text" name="nama_keuangan"
                                placeholder="Nama Keuangan">

                            <label for="cemail" class="control-label fw-bold text-dark">Kategori Keuangan</label>
                            <select class="form-select form-select-lg form-control mb-3" name="kategori_keuangan"
                                id="kategori_keuangan">
                                <option value="pemasukan">Pemasukan</option>
                                <option value="pengeluaran">Pengeluaran</option>
                            </select>

                            <label for="cemail" class="control-label fw-bold text-dark">Deskripsi</label>
                            <input class="form-control mb-3" type="text" name="deskripsi" placeholder="Deskripsi">

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
                        <h4 class="m-0 font-weight-bold text-primary">Keuangan</h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                           Add Kategori
                        </button>
                
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="table1" class="table-bordered">
                                        <thead>
                                            <tr class="box bg-primary" role="row">
                                                <th width="4%" class="text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="No.: activate to sort column descending">No.</th>
                                                <th class="text-center text-light" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" name="nama_keuangan"
                                                    aria-label="Nama Pembayaran: activate to sort column ascending">
                                                    Nama Keuangan</th>
                                                <th width="20%" class="text-center text-light" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" name="kategori_keuangan"
                                                    aria-label="Kategori Keuangan: activate to sort column ascending">
                                                    Kategori Keuangan</th>
                                                <th width="25%" class="text-center text-light" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" name="deskripsi"
                                                    aria-label="Deskripsi: activate to sort column ascending">Deskripsi
                                                </th>

                                                <th width="20%" class="sorting text-center text-light" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                                $no = 0;
                                            @endphp
                                            @foreach ($kategorikeuangan as $kk)
                                                @php
                                                    $no++;
                                                @endphp
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $kk->nama_keuangan }}</td>
                                                    <td class="text-center">{{ $kk->kategori_keuangan }}</td>
                                                    <td class="text-center">{{ $kk->deskripsi }}</td>

                                                    <td class="d-flex justify-content-center">
                                                        <a href="/kategorikeuangan/{{ $kk->id }}/edit"
                                                            id="2" class="edit me-2">
                                                            <button class="btn btn-outline-success btn-sm" type="button"><i class="fa fa-pencil-square"></i>
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <form action="/kategorikeuangan/{{ $kk->id }}" method='post'
                                                            class="me-1">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-outline-danger btn-sm"
                                                                type="submit"><i class="fas fa-trash-alt"></i>
                                                                Delete
                                                            </button>
                                                            {{-- <input class="btn btn-outline-danger btn-sm delete-data" type="submit"
                                                                value="Hapus"> --}}
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
