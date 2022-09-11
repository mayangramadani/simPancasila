@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        {{-- <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Sekolah</h1>
        </div> --}}

        <div class="mb-3">
            <a href="/sekolah/">Kembali</a>
        </div>


        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Edit Sekolah</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <form action="/sekolah/{{ $sekolah->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="mb-3 row">
                                    <label for="namasekolah" class="h3 col-sm-2 col-form-label fw-bold text-black">Nama Sekolah</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nama_sekolah"
                                            placeholder="Nama Sekolah" value="{{ $sekolah->nama_sekolah }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label fw-bold text-black">Derajat</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="text" name="derajat" placeholder="Derajat"
                                            value="{{ $sekolah->derajat }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label  fw-bold text-black">Lokasi</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="text" name="lokasi" placeholder="Lokasi"
                                            value="{{ $sekolah->lokasi }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="cemail" class="col-sm-2 col-form-label  fw-bold text-black">SPP</label>
                                    <div class="col-sm-10">
                                        <input class="form-control mb-3" type="text" name="spp" placeholder="Spp"
                                            id="dengan-rupiah" value="{{ $sekolah->spp }}">
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
