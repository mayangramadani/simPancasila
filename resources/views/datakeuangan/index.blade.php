@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        {{-- <div class="d-flex mb-3">
            <form action="{{ route('bayar') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">
                    Buka Pembayaran
                </button>
            </form>
        </div> --}}
        <div class="row mt-5">
            <div class="col-xl-3 col-md-6 mb-4 mr-3">
                <div class="card border-left-primary shadow-sm ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Saldo</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-6 mb-4 mr-3">
                <div class="card border-left-success shadow-sm ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-5">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Diterima</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">--</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 mb-4 mr-3">
                <div class="card border-left-warning shadow-sm ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-5">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Proses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">--</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-spinner fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 mb-4 mr-3">
                <div class="card border-left-danger shadow-sm   ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-5">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Ditolak</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">--</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-ban fa-2x text-gray-300"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary fw-bold" id="exampleModalLabel">Tambah Data Keuangan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/datakeuangan/add" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="sekolah" class="form-label text-dark fw-bold">Sekolah</label>
                                <select class="form-select form-select-lg form-control mb-3" name="sekolah_id">
                                    <option disabled>=== Pilih Sekolah ===</option>
                                    @foreach ($sekolah as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_sekolah }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mb-3">
                                    <label for="transaksi" class="form-label text-dark fw-bold">Kategori
                                        Keuangan</label>
                                    <select class="form-select form-select-lg form-control"
                                        aria-label="Default select example" name="kategori_keuangan_id">
                                        <option selected disabled>=== Kategori Keuangan ===</option>
                                        @foreach ($kategorikeuangan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_keuangan }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="namaKeuangan" class="form-label text-dark fw-bold">Nama Keuangan</label>
                                    <input type="text" class="form-control" id="namaKeuangan" name="nama_keuangan"
                                        placeholder="Nama Keuangan">
                                </div>
                                <div class="mb-3">
                                    <label for="cemail" class="control-label text-dark fw-bold">Jumlah</label>
                                    <input class="form-control mb-3" type="text" name="jumlah" id="dengan-rupiah"
                                        placeholder="exp. Rp 123.456">
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal" class="form-label text-dark fw-bold">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" name="tanggal">
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label text-dark fw-bold">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                        placeholder="Deskripsi">
                                </div>

                                <div class="mb-3">
                                    <label for="foto" class="form-label text-dark fw-bold">Bukti</label>
                                    <input class="form-control" type="file" id="formFile" name="bukti_transaksi">
                                </div>

                                {{-- <div class="mb-3">
                                    <label for="foto" class="form-label ">Status Pembayaran</label>
                                    <select class="form-select form-select-lg form-control"
                                        aria-label="Default select example" name="status_pembayaran">
                                        <option selected disabled>=== Status Pembayaran ===</option>
                                        <option value="Lunas" selected>Lunas</option>
                                        <option value="Belum Lunas" selected>Belum Lunas</option>
                                        <option value="Tolak" selected>Tolak</option>
                                        <option value="Proses" selected>Proses</option>
                                    </select>
                                </div> --}}

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
            <div class="card shadow-sm mb-4">
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
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Monitoring</button>
                    </li>
                </ul>

                <!-- RKAS -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="d-flex flex-row align-items-center justify-content-between">
                                        <h4 class="m-0 font-weight-bold text-dark">Rencana Kerja dan Anggaran Sekolah
                                        </h4>
                                        <div class="d-flex">
                                            <div class="col-md text-end mt-3"> <a href="{{ route('rkas') }}"
                                                    class="btn btn-primary ">RKAS</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card-body">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table id="table1" class="table-bordered" role="grid"
                                                        aria-describedby="example1_info">
                                                        <thead>
                                                            <tr class="box bg-primary" role="row">
                                                                <th width="5%"
                                                                    class="sorting_asc text-center text-light"
                                                                    tabindex="0" aria-controls="example1"
                                                                    rowspan="1" colspan="1" aria-sort="ascending">
                                                                    No.</th>
                                                                <th width="15%" class="text-center text-light"
                                                                    tabindex="0" aria-controls="example1"
                                                                    rowspan="1" colspan="1">Nama
                                                                    Kegiatan</th>
                                                                <th width="10%" class="text-center text-light"
                                                                    tabindex="0" aria-controls="example1"
                                                                    rowspan="1" colspan="1" id="dengan-rupiah">
                                                                    Jumlah
                                                                </th>
                                                                <th width="15%" class="text-center text-light"
                                                                    tabindex="0" aria-controls="example1"
                                                                    rowspan="1" colspan="1">Tanggal
                                                                </th>
                                                                <th width="15%" class="text-center text-light"
                                                                    tabindex="0" aria-controls="example1"
                                                                    rowspan="1" colspan="1">Status
                                                                    Pembayaran</th>
                                                                <th width="15%" class="text-center text-light"
                                                                    tabindex="0" aria-controls="example1"
                                                                    rowspan="1" colspan="1">Berkas
                                                                    Pendukung
                                                                </th>
                                                                <th width="20%" class="text-center text-light"
                                                                    tabindex="0" aria-controls="example1"
                                                                    rowspan="1" colspan="1">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 0;
                                                            @endphp
                                                            @foreach ($keuangan->where('kategori_keuangan_id', '3') as $dku)
                                                                @php
                                                                    $no++;
                                                                @endphp
                                                                <tr role="row" class="odd">
                                                                    <td class="text-center">{{ $no }}</td>
                                                                    <td class="text-center">
                                                                        {{ $dku->KategoriKeuangan->nama_keuangan }}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{ 'Rp ' . number_format($dku->jumlah, 0, '.', '.') }}
                                                                    </td>
                                                                    <td class="text-center">{{ $dku->tanggal }}</td>
                                                                    <td class="text-center">
                                                                        @if ($dku->status_pembayaran == 'Ditolak')
                                                                            <span class="badge bg-danger">Ditolak</span>
                                                                        @elseif ($dku->status_pembayaran == 'Belum Dibayar')
                                                                            <span class="badge bg-danger">Belum
                                                                                Dibayar</span>
                                                                        @elseif($dku->status_pembayaran == 'Diterima')
                                                                            <span class="badge bg-success">Diterima</span>
                                                                        @elseif($dku->status_pembayaran == 'Proses')
                                                                            <span class="badge bg-warning">Proses</span>
                                                                        @else
                                                                            <span class="badge bg-dark">Belum
                                                                                diperiksa</span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <img src="  {{ asset('storage/Keuangan/bukti/' . $dku->berkas_pendukung) }}"
                                                                            height="80">
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{-- <a href="/datakeuangan/{{ $dku->id }}/edit"
                                                                            id="2" class="edit me-1">
                                                                            <button
                                                                                class="btn btn-outline-success btn-sm mb-1"
                                                                                type="button"><i
                                                                                    class="fa fa-pencil-square"></i>
                                                                                Edit
                                                                            </button>
                                                                        </a> --}}
                                                                        <a href="/datakeuangan/{{ $dku->id }}/review"
                                                                            id="2" class="detail me-2" title="Review">
                                                                            <button class="btn btn-outline-success btn-sm"
                                                                                type="button"><i
                                                                                    class="fa fa-pencil-square"></i>
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
                    </div>

                    <!-- Penatausahaan/BKU -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="py-2 d-flex flex-row align-items-center justify-content-between">
                                        <h4 class="m-0 font-weight-bold text-dark">Buku Kas Umum Sekolah</h4>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Input
                                            </button>

                                        </div>

                                    </div>
                                    <div class="table-responsive">
                                        <table id="table2" class="table-bordered" role="grid"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr class="box bg-primary">
                                                    <th width="3%" class="sorting_asc text-center text-light"
                                                        tabindex="0" aria-controls="example1" rowspan="1"
                                                        colspan="1" aria-sort="ascending">No.</th>
                                                    <th width="15%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">
                                                        Kategori
                                                        Keuangan</th>
                                                    <th width="15%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Nama
                                                        Keuangan
                                                    </th>
                                                    <th width="15%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Jumlah
                                                    </th>
                                                    <th width="15%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">
                                                        Tanggal
                                                    </th>
                                                    <th width="15%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Status
                                                        Pembayaran</th>
                                                    <th width="15%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Nama
                                                        User
                                                    </th>
                                                    <th width="15%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">Aksi
                                                    </th>
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

                                                        <td class="text-center">{{ $no }}</td>
                                                        <td class="text-center">
                                                            {{ $dku->KategoriKeuangan->nama_keuangan }}</td>
                                                        <td class="text-center">{{ $dku->nama_keuangan }}</td>
                                                        <td class="text-center">
                                                            {{ 'Rp ' . number_format($dku->jumlah, 0, '.', '.') }}</td>
                                                        <td class="text-center">{{ $dku->tanggal }}</td>
                                                        {{-- <td class="text-center">{{ $dku->bukti }}
                                                            <img src="{{ url('asset/img/' . $dku->id . '/' . $dku->bukti) }}"
                                                                target="_blank" class="fw-bold" height="100px"></a>
                                                        </td> --}}

                                                        <td class="text-center">
                                                            @if ($dku->status_pembayaran == 'Ditolak')
                                                                <span class="badge bg-danger">Ditolak</span>
                                                            @elseif ($dku->status_pembayaran == 'Belum Dibayar')
                                                                <span class="badge bg-danger">Belum Dibayar</span>
                                                            @elseif($dku->status_pembayaran == 'Diterima')
                                                                <span class="badge bg-success">Diterima</span>
                                                            @elseif($dku->status_pembayaran == 'Proses')
                                                                <span class="badge bg-warning">Proses</span>
                                                            @else
                                                                <span class="badge bg-dark">Belum diperiksa</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">{{ $dku->users_id }}</td>
                                                        <td class="text-center" title="Detail">
                                                            <a href="/datakeuangan/{{ $dku->id }}/detail"
                                                                id="2" class="detail me-2">
                                                                <button class="btn btn-outline-info btn-sm"
                                                                    type="button"><i class="fa fa-pencil-square"></i>
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
                    <!-- Monitoring -->
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                $('#table2').DataTable();
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
    @endpush
@endsection
