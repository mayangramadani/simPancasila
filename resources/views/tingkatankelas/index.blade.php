@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary fw-bold" id="exampleModalLabel">Tingkatan Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/tingkatankelas/add" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="cemail" class="control-label text-dark fw-bold">Sekolah</label>
                            <select class="form-select form-select-md form- mb-3" name="sekolah_id">
                                <option>Pilih...</option>
                                @foreach ($sekolah as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_sekolah }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="cemail" class="control-label text-dark fw-bold">Tingkatan Kelas</label>
                            <input class="form-control mb-3" type="text" name="tingkatan_kelas"
                                placeholder="exp. Kelas 7">

                            <label for="cemail" class="control-label text-dark fw-bold">Deskripsi</label>
                            <input class="form-control mb-3" type="text" name="deskripsi" placeholder="deskripsi">

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

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Tingkatan Kelas</h4>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tingkatan Kelas
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="table1" class="table-bordered">
                                        <thead>
                                            <tr class="box bg-primary " role="row">
                                                <th width="4%" class="text-center text-light" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="No.: activate to sort column descending">No.</th>
                                                <th class="text-center text-light" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" name="nama_sekolah"
                                                    aria-label="Nama Pembayaran: activate to sort column ascending">
                                                    Nama Sekolah</th>
                                                <th width="15%" class="text-center text-light" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" name="tingkatan_kelas"
                                                    aria-label="tingkatan_kelas: activate to sort column ascending">
                                                    Tingkat Kelas
                                                </th>
                                                <th width="15%" class="text-center text-light" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" name="deskripsi"
                                                    aria-label="tingkatan_kelas: activate to sort column ascending">
                                                    Deskripsi
                                                </th>
                                                <th width="25%" class="text-center text-light" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                                $no = 0;
                                            @endphp
                                            @foreach ($tingkatankelas as $tk)
                                                @php
                                                    $no++;
                                                @endphp
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $tk->Sekolah->nama_sekolah }}</td>
                                                    <td class="text-center">{{ $tk->tingkatan_kelas }}</td>
                                                    <td class="text-center">{{ $tk->deskripsi }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <a href="/tingkatankelas/{{ $tk->id }}/edit" id="2"
                                                            class="edit me-2" title="Edit">
                                                            <button class="btn btn-outline-info btn-sm" type="button"><i class="fa fa-pencil-square"></i>
                                                            </button>
                                                        </a>
                                                        <form action="/tingkatankelas/{{ $tk->id }}" method='post'
                                                            class="me-2" title="Delete">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-outline-danger btn-sm"
                                                                type="submit"><i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>

                                                        <a href="/tingkatankelas/{{ $tk->id }}/detail"
                                                            id="2" class="detail me-2" title="Detail">
                                                            <button class="btn btn-outline-primary btn-sm" type="button"><i class="fa fa-eye"></i>
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
