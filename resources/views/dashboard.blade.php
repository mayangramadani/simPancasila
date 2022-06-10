@extends('layouts.main')
@section('container')
    
     <!-- Begin Page Content -->
     <div class="container-fluid">
        {{-- {{ Breadcrumbs::render('dashboard') }} --}}
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-5">
            <h6 class="d-sm-mb-0 text-gray-500">Selamat Datang di Halaman, Dashboard</h6>
        </div>


        <!-- Content Row -->
        <div class="row mb-4">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 mr-3">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Saldo</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 123.000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 mr-3">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-5">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Keuangan (Pemasukan)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 123.000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 mr-3">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Keuangan (Pengeluaran)
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp 123.999</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">History</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr class="box bg-teal" role="row">
                                            <th width="5%" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">No. Transaksi</th>
                                            <th width="25%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Jenis Pembayaran</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Jumlah</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Tanggal</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                      
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>12345678</td>
                                            <td>Pembayaran SPP</td>
                                            <td>Rp150.000</td>															
                                            <td>21/05/2022</td>															
                                            <td class="d-flex justify-content-center">	
                                                <a href="javascript:void(0)" id="2" class="detail">
                                                    <button class="btn text-bg-info" type="button">
                                                        <i class="fa fa-eye"></i>                                                                          Detail                
                                                    </button>                                           
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">2</td>
                                            <td>12345678</td>
                                            <td>Pembayaran SPP</td>
                                            <td>Rp150.000</td>															
                                            <td>21/05/2022</td>															
                                            <td class="d-flex justify-content-center">	
                                                <a href="javascript:void(0)" id="2" class="detail">
                                                    <button class="btn text-bg-info" type="button">
                                                        <i class="fa fa-eye"></i>                                                                          Detail                
                                                    </button>                                           
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">3</td>
                                            <td>12345678</td>
                                            <td>Pembayaran SPP</td>
                                            <td>Rp150.000</td>															
                                            <td>21/05/2022</td>															
                                            <td class="d-flex justify-content-center">	
                                                <a href="javascript:void(0)" id="2" class="detail">
                                                    <button class="btn text-bg-info" type="button">
                                                        <i class="fa fa-eye"></i>                                                                          Detail                
                                                    </button>                                           
                                                </a>
                                            </td>
                                        </tr>
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