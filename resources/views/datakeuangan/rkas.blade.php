@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- RKAS -->

                    <div class="row">
                        <div class="card-body">
                            <form class="validation" novalidate method="POST" action="{{ url('datakeuangan/add') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold text-primary" for="kelas">Nama
                                            Kegiatan</label>
                                        <input type="text" class="form-control" id="nama_keuangan"
                                            placeholder="Nama Kegiatan" required autocomplete="off">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold text-primary"
                                            for="kelas">Deskripsi</label>
                                        <input type="text" class="form-control" id="deskripsi" placeholder="Deskripsi"
                                            required autocomplete="off">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold text-primary"
                                            for="kelas">Status</label>
                                        <select class="form-select form-select-lg form-control"
                                            aria-label="Default select example" name="status_pembayaran">
                                            <option selected disabled>=== Status Pembayaran ===</option>
                                            <option value="Lunas" selected>Lunas</option>
                                            <option value="Belum Lunas" selected>Belum Lunas</option>
                                            <option value="Tolak" selected>Tolak</option>
                                            <option value="Proses" selected>Proses</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold text-primary"
                                            for="kelas">Jumlah</label>
                                        <input type="text" class="form-control" id="dengan-rupiah" placeholder="Jumlah"
                                            required autocomplete="off">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-control-label fw-semibold text-primary" for="kelas">Sumber
                                            Dana</label>
                                        <input type="text" class="form-control" id="sumber_dana"
                                            placeholder="Sumber Dana" required autocomplete="off">
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

                                <button class="btn btn-primary" id="btn-submit" type="submit">Bayar</button>
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
