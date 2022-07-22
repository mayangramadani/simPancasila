@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kategori Keuangan</h1>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Kategori Keuangan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kategori Keuangan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/kategorikeuangan/add" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="cemail" class="control-label">Nama Keuangan</label>
                            <input class="form-control mb-3" type="text" name="nama_keuangan" placeholder="Nama Keuangan">

                            <label for="cemail" class="control-label">Kategori Keuangan</label>
                            <select class="form-select form-select-lg form-control" name="kategori_keuangan" id="kategori_keuangan">
                                <option value="pemasukan">Pemasukan</option>
                                <option value="pengeluaran">Pengeluaran</option>
                            </select>

                            <label for="cemail" class="control-label">Deskripsi</label>
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
                        <h6 class="m-0 font-weight-bold text-primary">Sekolah</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="table1" class="table datatable table-bordered table-hover no-footer">
                                            <thead>
                                                <tr class="box bg-teal" role="row">
                                                    <th width="4%" class="sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="No.: activate to sort column descending">No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" name="nama_keuangan"
                                                        aria-label="Nama Pembayaran: activate to sort column ascending">
                                                        Nama Keuangan</th>
                                                    <th width="10%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        name="kategori_keuangan"
                                                        aria-label="Kategori Keuangan: activate to sort column ascending">
                                                        Kategori Keuangan</th>
                                                    <th width="40%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        name="deskripsi"
                                                        aria-label="Deskripsi: activate to sort column ascending">Deskripsi
                                                    </th>
                                                    
                                                    <th width="10%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
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
                                                        <td class="sorting_1">{{ $no }}</td>
                                                        <td>{{ $kk->nama_keuangan }}</td>
                                                        <td>{{ $kk->kategori_keuangan }}</td>
                                                        <td>{{ $kk->deskripsi }}</td>
                                                        
                                                        <td class="d-flex">
                                                            <a href="/kategorikeuangan/{{ $kk->id }}/edit" id="2"
                                                                class="edit me-2">
                                                                <button class="btn btn-outline-info" type="button">
                                                                    Edit
                                                                </button>
                                                            </a>
                                                            <form action="/ketegorikeuangan/{{ $kk->id }}" method='post'>
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
    </div>
@endsection
