@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
        </div>

        {{-- <div class="mb-5">
            {{ Breadcrumbs::render('tampilkan') }}
        </div> --}}

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Pembayaran</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">


                        <div class="p-3">
                            <div class="mb-3 row">
                                <label for="nis" class="col-sm-2 col-form-label text-dark">NIS <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control" id="nis" name="name"
                                        value="{{ $siswa->nis }}" disabled>

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="noTransaksi" class="col-sm-2 col-form-label text-dark">No. Transaksi <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control" id="noTransaksi" placeholder="No. Transaksi"
                                        disabled>

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namaLengkap" class="col-sm-2 col-form-label text-dark">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control" id="namaLengkap"
                                        value="{{ $siswa->nama_siswa }}" disabled>

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jumlahPembayaran" class="col-sm-2 col-form-label text-dark">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kelas" name="kelas"
                                        value="{{ $siswa->DataKelas->nama_kelas }}" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="transaksi" class="col-sm-2 col-form-label text-dark">Pembayaran</label>
                                <div class="col-sm-10">
                                    <select class="form-select form-select-lg form-control"
                                        aria-label="Default select example" name="jenis_transaksi">
                                        <option selected>Bulan</option>
                                        <option value="januari">Januari</option>
                                        <option value="februari">Februari</option>
                                        <option value="maret">Maret</option>
                                        <option value="april">April</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-2 col-form-label text-dark">Tanggal Transaksi</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="foto" class="col-sm-2 col-form-label text-dark">Bukti Pembayaran</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="bukti_transaksi">
                                </div>
                            </div>

                            <input type="button" class="btn btn-outline-primary mb-4" name="submit" value="Bayar">

                        </div>

                        {{-- Bagian Table pembayaran --}}
                        <div id="view_bayar">

                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover" id="theList" align="center">
                                    <tbody>
                                        <tr class="box bg-teal text-dark">
                                            <th width="7%">No.</th>
                                            <th>No. Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Pembayaran</th>
                                            <th>Jumlah</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                        <tr>
                                            <td align="center">1</td>
                                            <td>12345678</td>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td>
                                                <a href="javascript:void(0)" id="625" class="hapus">
                                                    <button class="btn btn-danger" type="button">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <script type="text/javascript">
                                $(function() {

                                    $(".hapus").click(function() {
                                        var id = this.id;

                                        var pilih = confirm('Apakah data ini akan dihapus ');
                                        if (pilih == true) {
                                            $.ajax({
                                                type: "POST",
                                                url: "pages/pembayaran/hapus.php",
                                                data: "id=" + id,
                                                success: function(data) {
                                                    $("#view_bayar").load('pages/pembayaran/view_bayar.php');
                                                    $("#total").load('pages/pembayaran/total.php');
                                                    $("#msg").show();
                                                    $("#msg").fadeOut(2500);
                                                    $("#msg").html("Data Berhasil dihapus");
                                                }

                                            });

                                        }
                                    });

                                })
                            </script>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        $("#nis").click(function() {
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
                },
            });
        });
        $(document).ready(function() {


            /* When click show user */
            $('body').on('click', '#nis', function() {
                var user_id = $(this).data('id');
                $.get('data-siswa/' + user_id, function(data) {
                    $('#userShowModal').html("User Details");
                    $('#ajax-modal').modal('show');
                    $('#user_id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                })
            });

        });
    </script>
@endsection
