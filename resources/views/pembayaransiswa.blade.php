@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
        </div>

        <div class="mb-5">
            {{ Breadcrumbs::render('pembayaran') }}
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Pembayaran</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="p-3">
                            <div class="mb-3 row">
                                <label for="nis" class="col-sm-2 col-form-label">NIS <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select id="nis" class="form-select" name="nis">
                                        <option selected>=== Pilih NIS Siswa ===</option>
                                        @foreach ($siswa as $ni)
                                            <option value="{{ $ni->id }}">{{ $ni->nis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namaLengkap" class="col-sm-2 col-form-label">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control" id="namaLengkap" placeholder="Nama Lengkap"
                                        disabled>

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jumlahPembayaran" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kelas" name="kelas"
                                        placeholder="Kelas" disabled>
                                </div>
                            </div>

                            <a href="/pembayaransiswa/{{ $ni->id }}/tampilkan" id="2" class="detail me-2">
                                <button class="btn btn-outline-info" type="button">
                                    Tampilkan
                                </button>
                            </a>

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
                    $('#kelas').val(response.kelas_id);
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
