@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="d-flex flex-row align-items-center justify-content-center py-3">
            <h3 class="m-0 font-weight-bold text-primary mb-7">Histori RKAS
            </h3>
        </div>
        <p class="mb-5 text-center">Untuk mengetahui status setiap kegiatan, dapat dilihat pada tabel berikut ini:</p>


            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- RKAS -->
                    <div class="row">     
                        <div class="card-body">
                            <div class="col-sm-12">        
                                <div class="row">
                                    <div class="card-body">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="table1" class="table-bordered" role="grid"
                                                    aria-describedby="example1_info">
                                                    <thead>
                                                        <tr class="box bg-primary" role="row">
                                                            <th width="5%" class="sorting_asc text-center text-light"
                                                                tabindex="0" aria-controls="example1" rowspan="1"
                                                                colspan="1" aria-sort="ascending">
                                                                No.</th>
                                                            <th width="15%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1">Nama
                                                                Kegiatan</th>
                                                            <th width="10%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1"
                                                                id="dengan-rupiah">
                                                                Jumlah
                                                            </th>
                                                            <th width="15%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1">
                                                                Tanggal
                                                            </th>
                                                            <th width="15%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1">
                                                                Status
                                                                Pembayaran</th>
                                                            <th width="15%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1">
                                                                Berkas
                                                                Pendukung
                                                            </th>
                                                            <th width="20%" class="text-center text-light" tabindex="0"
                                                                aria-controls="example1" rowspan="1" colspan="1">Aksi
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $no = 0;
                                                        @endphp
                                                        @foreach ($keuangan->where('kategori_keuangan_id', '3') as $dku)
                                                            @php
                                                                $no++;
                                                            @endphp
                                                            <tr role="row" class="odd">
                                                                <td class="text-center">{{ $no }}</td>
                                                                <td class="text-center">
                                                                    {{ $dku->KategoriKeuangan->nama_keuangan }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ 'Rp ' . number_format($dku->jumlah, 0, '.', '.') }}
                                                                </td>
                                                                <td class="text-center">{{ $dku->tanggal }}</td>

                                                             
                                                                 <td class="text-center">
                                                                    @if ($dku->status_pembayaran == 'Ditolak')
                                                                        <span class="badge bg-danger">Ditolak</span>
                                                                    @elseif ($dku->status_pembayaran == 'Belum Dibayar')
                                                                        <span class="badge bg-danger">Belum
                                                                            Dibayar</span>
                                                                    @elseif($dku->status_pembayaran == 'Diterima')
                                                                        <span class="badge bg-success">Diterima</span>
                                                                    @elseif($dku->status_pembayaran == 'Proses')
                                                                        <span class="badge bg-warning">Proses</span>
                                                                    @else
                                                                        <span class="badge bg-dark">Belum
                                                                            diperiksa</span>
                                                                    @endif
                                                                </td> 
                                                                {{-- <td class="text-center">{{ $dku->berkas_pendukung }}
                                                                </td> --}}
                                                                <td class="text-center"><a
                                                                    href="{{ asset('storage/Keuangan/bukti/' . $dku->berkas_pendukung) }}"
                                                                    target="_blank" class="fw-bold">Lihat disini</a>
                                                                </td>
                                                                <td class="d-flex justify-content-center" >
                                                                    <a href="/datakeuangan/{{ $dku->id }}/show"
                                                                        id="2" class="detail me-2" title="Show" target="_blank">
                                                                        <button class="btn btn-outline-success btn-sm"
                                                                            type="button"><i
                                                                                class="fa fa-eye"></i>
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
        $('#bulan_pembayaran').change(function() {
            var id = $(this).val();
            console.log('bulan_pembayaran', id)
            if (id) {
                $.ajax({
                    type: "GET",
                    url: "getPembayaran?id=" + id,
                    dataType: 'JSON',
                    success: function(res) {
                        console.log(res);
                        if (res) {
                            $("#dengan-rupiah").val(formatRupiah(res.jumlah, 'Rp. '));
                            $("#kategori_pembayaran").val(res.nama_keuangan);
                        } else {
                            // $("#tingkatan_kelas").empty();
                        }
                    }
                });
            }
        });
    </script>
    <script>
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
