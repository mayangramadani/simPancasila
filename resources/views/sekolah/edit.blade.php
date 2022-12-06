@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-flex flex-row align-items-center justify-content-center py-3">
            <h3 class="m-0 font-weight-bold text-primary mb-7">Update Data Sekolah
            </h3>
        </div>
        <p class="mb-5 text-center">Silakan input form pada data yang ingin dirubah, klik <a href="/sekolah">Sekolah</a> jika
            ingin melihat daftar sekolah </p>

        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="">
                            <form action="/sekolah/{{ $sekolah->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="col-md-12 mb-5" style="position: relative">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                                    </div>
                                    <p class="text-primary bg-white px-1 ml-3" style="position: absolute; top:10px;">
                                        Update Data</p>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="namasekolah" class="form-control-label fw-semibold text-dark">Nama
                                        Sekolah
                                    </label>
                                    <input value="{{ $sekolah->nama_sekolah }}" type="text"
                                        class="form-control form-control-md" id="nama_sekolah"
                                        placeholder="Masukkan Nama Sekolah" name="nama_sekolah">
                                </div>
                                <div class="d-flex">
                                    <div class="col-md-4 mb-3">
                                        <label for="derajat"
                                            class="form-control-label fw-semibold text-dark">Derajat <span class="fw-light">(SMP/SMA/SMK)</span></label>
                                        <input value="{{ $sekolah->derajat }}" type="text"
                                            class="form-control form-control-md" id="derajat"
                                            placeholder="Masukkan Derajat" name="derajat">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="spp" class="form-control-label fw-semibold text-dark">Spp <span class="fw-light">(/bln)</span></label>
                                        <input value="{{ $sekolah->spp }}" type="text"
                                            class="form-control form-control-md" id="dengan-rupiah"
                                            placeholder="Masukkan Spp" name="spp">
                                    </div>
                                </div>
                                    <div class="col-md-8 mb-5">
                                        <label for="lokasi" class="col-form-label text-dark fw-semibold">Lokasi</label>
                                        <textarea rows="5" type="textarea" class="form-control form-control-md" id="lokasi"
                                            placeholder="Masukkan Lokasi Lengkap" name="lokasi" value>{{ $sekolah->lokasi }}</textarea>
                                    </div>
                                <div class="col-md-12">
                                    <input class="btn btn-md btn-primary w-100 btn-block" type="submit" value="SIMPAN DATA"
                                        name="submit">
                                </div>
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
