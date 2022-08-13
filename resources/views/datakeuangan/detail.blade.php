@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Transaksi Keuangan</h1>
        </div>
        <div class="mb-3">
            <a href="/datakeuangan">Kembali</a>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Detail Data Keuangan</h5>
                        <div class="d-flex">
                            <a href="/datakeuangan/{{ $keuangan->id }}/edit" id="2" class="edit me-2">
                                <button class="btn btn-outline-info" type="button">
                                    Edit
                                </button>
                            </a>
                            <form action="/datakeuangan/{{ $keuangan->id }}" method='post'>
                                @csrf
                                @method('delete')
                                <input class="btn btn-outline-danger" type="submit" value="Hapus">
                            </form>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <div class="mb-3 row">
                                <label for="kategorikeuangan" class="col-sm-2 col-form-label fw-semibold">Kategori
                                    Keuangan</label>
                                <label for="kategorikeuangan" class="col-sm-2 col-form-label">:
                                    {{ $keuangan->KategoriKeuangan->nama_keuangan }}</label>
                            </div>
                            <div class="mb-3 row">
                                <label for="namakeuangan" class="col-sm-2 col-form-label fw-semibold">Nama
                                    Keuangan</label>
                                <label for="namakeuangan" class="col-sm-2 col-form-label">:
                                    {{ $keuangan->nama_keuangan }}</label>
                            </div>
                            <div class="mb-3 row">
                                <label for="jumlahtransaksi" class="col-sm-2 col-form-label fw-semibold">Jumlah
                                    Transaksi</label>
                                <label for="jumlahtransaksi" class="col-sm-2 col-form-label" id="dengan-rupiah">:
                                    {{ 'Rp ' . number_format($keuangan->jumlah, 0, '.', '.') }}</label>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-2 col-form-label fw-semibold">Tanggal Transaksi</label>
                                <label for="tanggal" class="col-sm-2 col-form-label">: {{ $keuangan->tanggal }}</label>
                            </div>
                            <div class="mb-3 row">
                                <label for="Deskripsi" class="col-sm-2 col-form-label fw-semibold">Deskripsi</label>
                                <label for="Deskripsi" class="col-sm-2 col-form-label">:
                                    {{ $keuangan->deskripsi }}</label>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label fw-semibold">Bukti</label>
                                <label for="foto" class="col-sm-2 col-form-label">: <img width="100"
                                        src="{{ asset('storage/Keuangan/bukti/' . $keuangan->bukti_transaksi) }}"
                                        alt="Profile"></label>
                            </div>

                            {{-- <input class="btn btn-primary" type="submit" value="Submit" name="submit"> --}}
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
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script> --}}
    @endpush
@endsection
