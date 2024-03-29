@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('sweetalert::alert')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-center mb-3">
            <h6 class="d-sm-mb-0 text-gray-500">Selamat Datang di Halaman <span class="fw-bold"> Kategori Keuangan</span></h6>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-3">
            <h4 class=" text-primary fw-bold">Kategori Keuangan</h4>
        </div>

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
            {{-- <div class="pl-5 py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="m-0 font-weight-bold text-primary">Keuangan</h4>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Kategori
                </button>
            </div> --}}
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active position-relative" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                aria-selected="true">Form Kategori
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Kategori
                                Keuangan</button>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact"
                                aria-selected="false">Monitoring</button>
                        </li> --}}
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- Card Header - Dropdown -->
                            <div class="card-body">
                                <p>isilah form berikut ini dengan benar.</p>
                                <div class="row pl-5 mt-5">
                                    <div class="col-sm-12">
                                        <form action="/kategorikeuangan/add" method="POST">
                                            @csrf
                                            
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-control-label fw-semibold text-primary"
                                                        for="nama">Nama
                                                        Keuangan :</label>
                                                    <input class="form-control" name="nama_keuangan" placeholder="Nama Keuangan">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-control-label fw-semibold text-primary"
                                                        for="kelas">Kategori
                                                        Keuangan :</label>
                                                    <select class="form-select form-select-lg form-control"
                                                        name="kategori_keuangan" id="kategori_keuangan">
                                                        <option>Pilih...</option>
                                                        <option value="pemasukan">Pemasukan</option>
                                                        <option value="pengeluaran">Pengeluaran</option>
                                                    </select>
                                                </div>


                                                <div class="col-md-4">
                                                    <label class="form-control-label fw-semibold text-primary"
                                                        for="nama">Deskripsi :</label>
                                                    <input class="form-control" name="deskripsi" placeholder="Deskripsi">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end ">
                                                <button class="btn btn-primary">submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

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
                                                            aria-label="No.: activate to sort column descending">No.
                                                        </th>
                                                        <th class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            name="nama_keuangan"
                                                            aria-label="Nama Pembayaran: activate to sort column ascending">
                                                            Nama Keuangan</th>
                                                        <th width="20%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            name="kategori_keuangan"
                                                            aria-label="Kategori Keuangan: activate to sort column ascending">
                                                            Kategori Keuangan</th>
                                                        <th width="25%" class="text-center text-light" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            name="deskripsi"
                                                            aria-label="Deskripsi: activate to sort column ascending">
                                                            Deskripsi
                                                        </th>

                                                        <th width="20%" class="sorting text-center text-light"
                                                            tabindex="0" aria-controls="example1" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Action: activate to sort column ascending">
                                                            Action</th>

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
                                                                    id="2" class="edit me-2" title="Edit">
                                                                    <button class="btn btn-outline-success btn-sm"
                                                                        type="button"><i class="fa fa-pencil-square"></i>
                                                                    </button>
                                                                </a>
                                                                <form action="/kategorikeuangan/{{ $kk->id }}"
                                                                    method='post' class="me-1" title="Hapus">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-outline-danger btn-sm"
                                                                        type="submit"><i class="fas fa-trash-alt"></i>
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
