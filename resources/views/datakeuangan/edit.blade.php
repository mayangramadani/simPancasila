@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800">Edit Transaksi</h1>
       </div> --}}

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Edit Data</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="/datakeuangan/{{ $keuangan->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="transaksi"
                                            class="form-control-label fw-bold text-primary">Jenis
                                            Transaksi</label>

                                        <select class="form-select form-select-lg form-control"
                                            aria-label="Default select example" name="kategori_keuangan">
                                            <option selected>Jenis</option>
                                            <option value="pemasukan" @if ($keuangan->kategori_keuangan == 'pemasukan') selected @endif>
                                                Pemasukan</option>
                                            <option value="pengeluaran" @if ($keuangan->kategori_keuangan == 'pengeluaran') selected @endif>
                                                Pengeluaran</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="namaLengkap"
                                            class="form-control-label fw-bold text-primary">Jumlah
                                            Transaksi</label>
                                       
                                            <input type="text" class="form-control" id="dengan-rupiah" name="jumlah"
                                                placeholder="Cth: 100000" value="{{ $keuangan->jumlah }}">
                                        
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="tanggal" class="form-control-label fw-bold text-primary">Tanggal Transaksi</label>
                                      
                                            <input type="date" class="form-control" name="tanggal"
                                                value="{{ $keuangan->tanggal }}">
                                        
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="nis" class="form-control-label fw-bold text-primary">Deskripsi</label>
                                      
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                placeholder="deskripsi" value="{{ $keuangan->deskripsi }}">
                                        
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="foto" class="form-control-label fw-bold text-primary">Bukti</label>
                                      
                                            <input class="form-control" type="file" id="formFile" name="bukti"
                                                value="{{ $keuangan->bukti }}">
                                        
                                    </div>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                            </form>
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
