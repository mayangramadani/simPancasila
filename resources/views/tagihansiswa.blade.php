@extends('layouts.main')
@section('container')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tagihan Siswa</h1>
        </div>
        <div class="form-group  mt-4">
            <div class="col-lg-4">
                <form action="#" method="POST">
                    @csrf
                <label for="cemail" class="control-label">Nama Siswa</label>
                <input class="form-control mb-3" type="text" name="nama_kelas" placeholder="Nama Kelas">
                    <input class="btn btn-warning" type="submit" value="Tampilkan" name="submit">
            </form>
            </div>
            
        </div>
            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr class="box bg-teal" role="row">
                                                    <th width="5%" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No.: activate to sort column descending">No.</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Kelas/Rombel: activate to sort column ascending">NIS</th>
                                                    <th width="25%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tingkat Kelas: activate to sort column ascending">Nama</th>
                                                    <th width="20%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Kelas</th>
                                                    <th width="20%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Tagihan</th>
                                                    <th width="20%" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
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
      

@endsection