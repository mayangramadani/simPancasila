@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
 
        <div class="d-flex flex-row align-items-center justify-content-center py-3">
            <h3 class="m-0 font-weight-bold text-primary mb-7">Daftar Sekolah
            </h3>
        </div>
        <p class="mb-3 text-center">Berikut daftar sekolah yang terdapat pada Yayasan Sinar Pancasila</p>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-primary fw-bold" id="exampleModalLabel">Sekolah</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/sekolah/add" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="cemail" class="control-label text-dark fw-bold">Nama Sekolah</label>
                            <input class="form-control mb-3" type="text" name="nama_sekolah" placeholder="ex. SMP Pancasila">

                            <label for="cemail" class="control-label text-dark fw-bold">Derajat</label>
                            <input class="form-control mb-3" type="text" name="derajat" placeholder="ex. SMP/SMA/SMK/MA">

                            <label for="cemail" class="control-label text-dark fw-bold">Lokasi</label>
                            <input class="form-control mb-3" type="text" name="lokasi" placeholder="Lokasi">

                            <label for="cemail" class="control-label text-dark fw-bold">SPP</label>
                            <input class="form-control mb-3" type="text" name="spp" placeholder="ex. Rp 100.000"
                                id="dengan-rupiah">

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
            <div class="mb-3 d-flex flex-row align-items-center justify-content-end"> 
                {{-- <h5 class="m-0 font-weight-bold text-primary">Data Sekolah</h5> --}}
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class="fa fa-plus"></i> 
                    Add Sekolah
                </button>
            </div>
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    
                       
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
                                                    aria-label="No.: activate to sort column descending">No.</th>
                                                <th width="20%" class="text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    name="nama_sekolah"
                                                    aria-label="Nama Pembayaran: activate to sort column ascending">
                                                    Nama Sekolah</th>
                                                <th width="10%" class="text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1" name="derajat"
                                                    aria-label="Derajat: activate to sort column ascending">
                                                    Derajat</th>
                                                <th width="30%" class="text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1" name="lokasi"
                                                    aria-label="Lokasi: activate to sort column ascending">
                                                    Lokasi
                                                </th>
                                                <th width="15%" class="text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    name="spp" aria-label="spp: activate to sort column ascending">SPP
                                                </th>
                                                <th width="15%" class="text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    name="Action" aria-label="Action: activate to sort column ascending">
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                                $no = 0;
                                            @endphp
                                            @foreach ($sekolah as $s)
                                                @php
                                                    $no++;
                                                @endphp
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $s->nama_sekolah }}</td>
                                                    <td class="text-center">{{ $s->derajat }}</td>
                                                    <td>{{ $s->lokasi }}</td>
                                                    {{-- <td>{{ $s->spp }}</td> --}}
                                                    <td class="text-center">
                                                        {{ 'Rp ' . number_format($s->spp, 0, '.', '.') }}</td>
                                                        

                                                    <td class="d-flex py-4 justify-content-center">
                                                        <a href="/sekolah/{{ $s->id }}/edit" id="2"
                                                            class="edit me-1" title="Edit">
                                                            <button class="btn btn-outline-success btn mb-1"
                                                                type="button"><i class="fa fa-pencil-square"></i>                    
                                                            </button>
                                                        </a>
                                                        <form action="/sekolah/{{ $s->id }}" method='post'
                                                            class="me-1" title="Hapus">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-outline-danger btn"
                                                                type="submit"><i class="fas fa-trash-alt"></i>                                                        
                                                            </button>
                                                        </form>
                                                        <a href="/sekolah/{{ $s->id }}/detail" id="2"
                                                            class="" title="Detail">
                                                            <button class="btn btn-outline-primary btn"
                                                                type="button"><i class="fa fa-eye"></i>                                                          
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                console.log('asdas');
                $('#table1').DataTable();

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
