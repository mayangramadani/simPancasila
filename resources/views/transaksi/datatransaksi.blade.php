@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
        </div>
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Pembayaran</h6>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ url('transaksi/datatransaksi/add') }}" class="btn btn-sm btn-warning">Add</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Master Data Rombel</h3>
                    @if (Session::has('message'))
                        <div class="alert alert-{{ Session::get('message_type') }} alert-dismissible fade show mt-3"
                            role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <span class="alert-text"><strong>{{ ucwords(Session::get('message_type')) }}!</strong>
                                {{ Session::get('message') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>#ID</th>
                                <th>Tahun Ajaran</th>
                                <th>Nominal</th>
                                <th>Info</th>
                                <th>Total Siswa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#ID</th>
                                <th>Tahun Ajaran</th>
                                <th>Nominal</th>
                                <th>Info</th>
                                <th>Total Siswa</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($datatransaksi as $dt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dt->period }}</td>
                                    <td>{{ $dt->amount }}</td>
                                    <td>{{ $dt->info }}</td>
                                    <td>{{ $dt->total }}</td>
                                    <td>
                                        <a href="{{ url('transaksi/datatransaksi/edit') . '/' . $dt->id }}"
                                            class="btn btn-sm btn-warning text-white" title="Edit Data"><i
                                                class="ni ni-ruler-pencil"></i></a>
                                        <a href="javascript:void(0)" onclick="destroy({{ $dt->id }})"
                                            class="btn btn-sm btn-danger text-white"><i class="ni ni-box-2"
                                                title="Hapus Data"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('bottom')
    <!-- Optional JS -->
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
@endpush
