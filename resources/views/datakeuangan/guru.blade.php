@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- RKAS -->
                    <div class="row">
                        <div class="card-body">
                            <div class="col-sm-12">
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <h4 class="m-0 font-weight-bold text-dark">Rencana Kerja dan Anggaran Sekolah</h4>
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
                                                            <th width="5%" class="sorting_asc text-center text-light"
                                                                tabindex="0" aria-controls="example1" rowspan="1"
                                                                colspan="1" aria-sort="ascending">
                                                                No.</th>
                                                            <th width="15%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1">Nama
                                                                Kegiatan</th>
                                                            <th width="10%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1"
                                                                id="dengan-rupiah">
                                                                Jumlah
                                                            </th>
                                                            <th width="15%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1">
                                                                Tanggal
                                                            </th>
                                                            <th width="15%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1">
                                                                Status
                                                                Pembayaran</th>
                                                            <th width="15%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1">
                                                                Sumber
                                                                Dana
                                                            </th>
                                                            <th width="15%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1">
                                                                Berkas
                                                                Pendukung
                                                            </th>
                                                            <th width="20%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1">Aksi
                                                            </th>
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
                                                                <td class="text-center">{{ $dku->jumlah }}
                                                                    {{-- {{ 'Rp ' . number_format($dku->jumlah, 0, '.', '.') }} --}}
                                                                </td>
                                                                <td class="text-center">{{ $dku->tanggal }}</td>

                                                                {{-- <td class="text-center">{{ $dku->status_pembayaran }}</td> --}}

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
                                                                    {{ $dku->SumberDana->sumber_dana }}</td>
                                                                <td class="text-center">{{ $dku->berkas_pendukung }}
                                                                </td>
                                                                <td class="d-felx justify-content-center">
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
                                                                        id="2" class="detail me-2">
                                                                        <button class="btn btn-outline-success btn-sm"
                                                                            type="button"><i
                                                                                class="fa fa-pencil-square"></i>
                                                                            Review
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
            </div>
        </div>
    </div>
@endsection
