@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Saldo</h1>
        </div>
        <div class="form-group  mt-4">
            <div class="col-lg-4">
                <form action="/saldo/{{ $saldo->id }}" method="POST">
                    @method('put')
                    @csrf
                    <label for="cemail" class="control-label">Nama Sekolah</label>
                    <select class="form-select form-select-lg mb-3 form-control" name="sekolah_id">
                        @foreach ($datasekolah as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                        @endforeach
                    </select>

                    <label for="cemail" class="control-label">Debit</label>
                    <input class="form-control mb-3" type="number" name="debit" placeholder="Debit" id="dengan-rupiah"
                        value="{{ $saldo->debit }}">
                    <label for="cemail" class="control-label">Kredit</label>
                    <input class="form-control mb-3" type="number" name="kredit" placeholder="kredit" id="dengan-rupiah"
                        value="{{ $saldo->kredit }}">
                    <label for="cemail" class="control-label">Saldo</label>
                    <input class="form-control mb-3" type="number" name="saldo" placeholder="saldo" id="dengan-rupiah"
                        value="{{ $saldo->saldo }}">

                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">

                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                console.log('asdas');
                $('#table1').DataTable();
            });
        </script>
        <script>
            $("#nis").click(function() {
                console.log("Erza");
                var id = $('#nis').val();
                $.ajax({
                    url: 'data-siswa/' + id,
                    type: 'get',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(id);
                        $('#namaLengkap').val(response.nama_siswa);
                        $('#rombel').val(response.nama_kelas);
                    },
                });
            });
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
        </script>
    @endpush
@endsection
