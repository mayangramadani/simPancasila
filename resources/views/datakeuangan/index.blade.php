@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Keuangan</h1>
        </div>

        {{-- <div class="mb-5">
            {{ Breadcrumbs::render('datasiswa') }}
        </div> --}}


        <div class="container-fluid mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Input Data Keuangan
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Keuangan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/datakeuangan/add" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="saldo" class="form-label">Sekolah</label>
                                    <select class="form-select form-select-lg form-control" name="saldo_id">
                                        <option disabled>=== Pilih Sekolah ===</option>
                                        @foreach ($saldo as $item)
                                            <option value="{{ $item->id }}">{{ $item->Sekolah->nama_sekolah }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="transaksi" class="form-label">Jenis Transaksi</label>
                                    <select class="form-select form-select-lg form-control"
                                        aria-label="Default select example" name="jenis_transaksi">
                                        <option selected disabled>Jenis</option>
                                        @foreach ($KategoriKeuangan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_keuangan }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="namaKeuangan" class="form-label">Nama Keuangan</label>
                                    <input type="text" class="form-control" id="namaKeuangan" name="nama_keuangan"
                                        placeholder="Nama Keuangan">
                                </div>
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">Jumlah Transaksi</label>
                                    <input type="text" class="form-control" id="jumlahTransaksi" name="jumlah"
                                        placeholder="Cth: 100000">
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" name="tanggal">
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                        placeholder="Deskripsi">
                                </div>
                                <div class="mb-3">
                                    <label for="nis" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        placeholder="Keterangan">
                                </div>

                                <div class="mb-3">
                                    <label for="foto" class="form-label">Bukti</label>
                                    <input class="form-control" type="file" id="formFile" name="bukti_transaksi">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Keuangan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-hover dataTable no-footer"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr class="box bg-teal" role="row">
                                            <th width="5%" class="sorting_asc" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1"
                                                aria-sort="ascending">No.</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Nama Keuangan</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Jumlah</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Deskripsi</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Tanggal</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Bukti</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Nama User</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Jenis Kuangan</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Sekolah</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($keuangan as $dku)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr role="row" class="odd">

                                                <td>{{ $no }}</td>
                                                <td>{{ $dku->nama_keuangan }}</td>
                                                <td>{{ $dku->jumlah }}</td>
                                                <td>{{ $dku->tanggal }}</td>
                                                <td>{{ $dku->deskripsi }}</td>
                                                <td>{{ $dku->bukti }}</td>
                                                <td>{{ $dku->users_id }}</td>
                                                <td>{{ $dku->jenis_keuangan_id }}</td>
                                                <td>{{ $dku->Saldo->Sekolah->nama_sekolah }}</td>

                                                {{-- <td>{{ $dku->saldo }}</td> --}}
                                                <td class="d-felx">
                                                    <a href="/datakeuangan/{{ $dku->id }}/detail" id="2"
                                                        class="detail me-2">
                                                        <button class="btn btn-outline-info" type="button">
                                                            Detail
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
@endsection
