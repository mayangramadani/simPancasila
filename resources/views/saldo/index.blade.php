@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Histori Saldo</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="table1" class="table-bordered">
                                            <thead>
                                                <tr class="box bg-primary" role="row">
                                                    <th width="5%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="No.: activate to sort column descending">No.</th>
                                                    <th class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Sekolah: activate to sort column ascending">
                                                        Sekolah</th>
                                                    <th class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Debit: activate to sort column ascending">
                                                        Debit</th>
                                                    <th width="25%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Kredit: activate to sort column ascending">
                                                        Kredit</th>
                                                    <th width="20%" class="text-center text-light" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Saldo: activate to sort column ascending">Saldo
                                                    </th>
                                                    {{-- <th width="20%" class="text-center text-primary" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @php
                                                    $no = 0;
                                                @endphp
                                                @foreach ($saldo as $s)
                                                    @php
                                                        $no++;
                                                    @endphp
                                                    <tr role="row" class="odd">
                                                        <td class="text-center">{{ $no }}</td>
                                                        <td class="text-center">{{ $s->sekolah->nama_sekolah }}</td>
                                                        <td class="text-center">
                                                            {{ 'Rp ' . number_format($s->debit, 0, '.', '.') }}</td>
                                                        <td class="text-center">{{ $s->kredit }}</td>
                                                        {{-- <td>{{ 'Rp ' . number_format($s->kredit, 0, '.', '.') }}</td> --}}
                                                        <td class="text-center">
                                                            {{ 'Rp ' . number_format($s->saldo, 0, '.', '.') }}</td>
                                                        {{-- <td class="d-flex">
                                                            <a href="/saldo/{{ $s->id }}/edit" id="2"
                                                                class="edit me-2">
                                                                <button class="btn btn-outline-info btn-sm"
                                                                    type="button"><i class="fa fa-pencil-square"></i>
                                                                    Edit
                                                                </button>
                                                            </a>
                                                            <form action="/saldo/{{ $s->id }}" method='post'>
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-outline-danger btn-sm"
                                                                    type="submit"><i class="fas fa-trash-alt"></i>
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </td> --}}
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

                //coba jquery
                // document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
                //     element.addEventListener('keyup', function(e) {
                //         let cursorPostion = this.selectionStart;
                //         let value = parseInt(this.value.replace(/[^,\d]/g, ''));
                //         let originalLenght = this.value.length;
                //         if (isNaN(value)) {
                //             this.value = "";
                //         } else {
                //             this.value = value.toLocaleString('id-ID', {
                //                 currency: 'IDR',
                //                 style: 'currency',
                //                 minimumFractionDigits: 0
                //             });
                //             cursorPostion = this.value.length - originalLenght + cursorPostion;
                //             this.setSelectionRange(cursorPostion, cursorPostion);
                //         }
                //     });
                // });
            });
        </script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script> --}}
    @endpush
@endsection
