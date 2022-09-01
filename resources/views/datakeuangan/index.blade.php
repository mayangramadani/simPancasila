@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav>
            <ol class="breadcrumb">
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Input Keuangan
                </button>
                <form action="{{ route('bayar') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Buka Pembayaran
                    </button>
                </form>
            </ol>
        </nav>

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
                                <label for="sekolah" class="form-label">Sekolah</label>
                                <select class="form-select form-select-lg form-control" name="sekolah_id">
                                    <option disabled>=== Pilih Sekolah ===</option>
                                    @foreach ($sekolah as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_sekolah }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mb-3">
                                    <label for="transaksi" class="form-label">Kategori Keuangan</label>
                                    <select class="form-select form-select-lg form-control"
                                        aria-label="Default select example" name="kategori_keuangan_id">
                                        <option selected disabled>=== Kategori Keuangan ===</option>
                                        @foreach ($kategorikeuangan as $item)
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
                                    <label for="cemail" class="control-label">Jumlah</label>
                                    <input class="form-control mb-3" type="text" name="jumlah" id="dengan-rupiah" />
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
                                    <label for="foto" class="form-label">Bukti</label>
                                    <input class="form-control" type="file" id="formFile" name="bukti_transaksi">
                                </div>

                                <div class="mb-3">
                                    <label for="foto" class="form-label">Status Pembayaran</label>
                                    <select class="form-select form-select-lg form-control"
                                        aria-label="Default select example" name="status_pembayaran">
                                        <option selected disabled>=== Status Pembayaran ===</option>
                                        <option value="Lunas" selected>Lunas</option>
                                        <option value="Belum Lunas" selected>Belum Lunas</option>
                                        <option value="Tolak" selected>Tolak</option>
                                        <option value="Proses" selected>Proses</option>
                                    </select>
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
                {{-- <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between"> --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">RKAS</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Penatausahaan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Arsip</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="table1" class="table table-bordered table-hover dataTable no-footer"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr class="box bg-teal" role="row">
                                                    <th width="5%" class="sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending">No.</th>
                                                    <th width="15%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Kategori
                                                        Keuangan</th>
                                                    <th width="15%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Nama
                                                        Keuangan
                                                    </th>
                                                    <th width="15%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Jumlah
                                                    </th>
                                                    <th width="15%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Deskripsi
                                                    </th>
                                                    <th width="15%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Tanggal
                                                    </th>
                                                    <th width="15%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Bukti</th>
                                                    <th width="15%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Status
                                                        Pembayaran</th>
                                                    <th width="15%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Nama User
                                                    </th>
                                                    <th width="15%" class="sorting" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Aksi</th>
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
                                                        <td>{{ $dku->KategoriKeuangan->nama_keuangan }}</td>
                                                        <td>{{ $dku->nama_keuangan }}</td>
                                                        <td>{{ 'Rp ' . number_format($dku->jumlah, 0, '.', '.') }}</td>
                                                        <td>{{ $dku->deskripsi }}</td>
                                                        <td>{{ $dku->tanggal }}</td>
                                                        <td>{{ $dku->bukti }}</td>
                                                        <td>{{ $dku->status_pembayaran }}</td>
                                                        <td>{{ $dku->users_id }}</td>
                                                        <td class="d-felx">
                                                            <a href="/datakeuangan/{{ $dku->id }}/detail"
                                                                id="2" class="detail me-2">
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
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                console.log('asdas');
                $('#table1').DataTable();
                //coba jquery
                // $('#saldo').inputmask()

                /* Dengan Rupiah */
                var dengan_rupiah = document.getElementById('dengan-rupiah');
                dengan_rupiah.addEventListener('keyup', function(e) {
                    dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
                });

                /* Fungsi */
                function formatRupiah(angka, prefix) {
                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split = number_string.split(','),
                        sisa = split[0].length % 3,
                        rupiah = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                }

            });
        </script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script> --}}
    @endpush
@endsection
