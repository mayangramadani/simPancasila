@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="pl-4 py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Form Rencana Kerja dan Anggaran Sekolah</h5>
            </div>
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <div class="mt-4 row pl-3">
                        <p class="">Isilah form berikut dengan data yang benar.</p>
                    </div>
                    <!-- RKAS -->
                    <div class="card-body pl-5">
                    
                        <form class="validation" novalidate method="POST" action="{{ url('datakeuangan/rkas') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label fw-semibold text-primary" for="kelas">Nama
                                        Kegiatan</label>
                                    <input type="text" class="form-control" id="nama_keuangan" name="nama_keuangan"
                                        placeholder="Nama Kegiatan" required autocomplete="off">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label fw-semibold text-primary"
                                        for="kelas">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" placeholder="Deskripsi"
                                        name="deskripsi" required autocomplete="off">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label fw-semibold text-primary" for="kelas">Jumlah</label>
                                    <input type="text" class="form-control" id="dengan-rupiah" placeholder="Jumlah"
                                        name="jumlah" required autocomplete="off">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="transaksi"
                                        class="form-control-label fw-semibold text-primary">tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="foto" class="form-control-label fw-semibold text-primary">Berkas
                                        Pendukung</label>
                                    <input class="form-control" type="file" id="formFile" name="berkas_pendukung">
                                </div>
                            </div>

                            <button class="btn btn-primary" id="btn-submit" type="submit">Add</button>
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
