@extends('layouts.main')
@section('container')
    
     <!-- Begin Page Content -->
     <div class="container-fluid">
        {{-- {{ Breadcrumbs::render('dashboard') }} --}}
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">History Pembayaran</h1>
   
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h6 class="d-sm-mb-0 text-gray-500">Selamat Datang di Halaman, Histori Pembayaran Siswa</h6>
        </div>
            <div class="d-sm-flex align-items-center justify-content-end">
            <input class="btn btn-danger" type="submit" value="Cetak" name="submit">
            </div>
        <!-- Content Row -->
        <div class="row mb-2">

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
                                            <th width="5%" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No. Transaksi</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">NIS</th>
                                            <th width="15%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama Siswa</th>
                                            <th width="25%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Jenis Pembayaran</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                      
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>12345678</td>
                                            <td>11181046</td>
                                            <td>Mayang Ramadani</td>
                                            <td>Pembayaran SPP</td>																													
                                            <td>21/05/2022</td>		
                                            <td>Rp150.000</td>													
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>12345678</td>
                                            <td>11181046</td>
                                            <td>Abcdefghij</td>
                                            <td>Buku</td>																													
                                            <td>21/05/2022</td>		
                                            <td>Rp150.000</td>													
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>12345678</td>
                                            <td>11181046</td>
                                            <td>May</td>
                                            <td>Pembayaran SPP</td>																													
                                            <td>21/05/2022</td>		
                                            <td>Rp150.000</td>													
                                        </tr>
                                       
                                    </tbody>
                                </table>

                                <nav aria-label="...">
                                    <ul class="pagination justify-content-end">
                                      <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item active">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                      </li>
                                    </ul>
                                  </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection