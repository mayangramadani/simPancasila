@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex flex-row align-items-center justify-content-center py-3">
            <h3 class="m-0 font-weight-bold text-primary mb-7">Transaksi Pembayaran
            </h3>
        </div>
        <p class="mb-3 text-center">Silahkan ke halaman <a href="/dashboard">Dashboard</a> untuk melihat petunjuk pembayaran</p>
        
        {{-- <h4 class="m-0 font-weight-bold text-primary">Transaksi Pembayaran</h1> --}}
        <div class="d-flex justify-content-end mb-3 ">
            <form action="{{ route('bayar') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm">
                    Buka Pembayaran
                </button>
            </form>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow-sm mb-4">
                    <!-- Card header -->
                    <div class="card-body">
                        <form class="validation" novalidate method="POST" action="{{ url('transaksipembayaran/add') }}"
                            autocomplete="off">
                            @csrf
                            <!--Make sure the form has the autocomplete function switched off:-->
                            {{-- <div class="autocomplete mb-5" style="width:300px;">
                                    <input id="nama_siswa" type="text" name="nama_siswa" placeholder="Nama Siswa">
                                </div> --}}

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label fw-semibold" for="nama_siswa">Nama Siswa *</label>
                                    <select class="form-control nama_siswa selectpicker " id="selectcountry"
                                        data-live-search="true">
                                        @foreach ($siswa as $ni)
                                            <option value="{{ $ni->id }}" data-tokens="{{ $ni->nama_siswa }}">
                                                {{ $ni->nama_siswa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label fw-semibold" for="kelas">NIS *</label>
                                    <input type="text" class="form-control" id="nis" placeholder="Kelas" required
                                        autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-10">
                                    <label class="form-control-label fw-semibold" for="bulan_pembayaran">Bulan
                                        Pembayaran *</label>
                                    <select class="form-control" name="bulan_pembayaran" id="bulan_pembayaran" required>
                                        <option selected disabled>Pilih...</option>
                                        {{-- @foreach ($transaksipembayaran->where('status_pembayaran', '!=', 'Proses')->where('status_pembayaran', '!=', 'Lunas') as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_keuangan }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label fw-semibold" for="name">Jumlah
                                        Pembayaran *</label>
                                    <input type="text" class="form-control" id="dengan-rupiah"
                                        placeholder="Jumlah Pembayaran" name='jumlah' readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="foto" class="form-control-label fw-semibold">Bukti</label>
                                    <input class="form-control" type="file" id="formFile" name="bukti_pembayaran">
                                </div>
                            </div>
                            <button class="btn btn-primary" id="btn-submit" type="submit">Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            var countries = ["aaa", "bhsadgah", "jshdja", "jhsajdhajd", "hsdh", "abcde", "efghijklmn", "opqrstu"];
            autocomplete(document.getElementById("nama_siswa"), countries);

            function autocomplete(inp, arr) {
                var currentFocus;
                inp.addEventListener("input", function(e) {
                    var a, b, i, val = this.value;
                    closeAllLists();
                    if (!val) {
                        return false;
                    }
                    currentFocus = -1;
                    a = document.createElement("DIV");
                    a.setAttribute("id", this.id + "autocomplete-list");
                    a.setAttribute("class", "autocomplete-items");
                    this.parentNode.appendChild(a);
                    for (i = 0; i < arr.length; i++) {
                        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                            b = document.createElement("DIV");
                            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                            b.innerHTML += arr[i].substr(val.length);
                            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                            b.addEventListener("click", function(e) {
                                inp.value = this.getElementsByTagName("input")[0].value;
                                closeAllLists();
                            });
                            a.appendChild(b);
                        }
                    }
                });
                inp.addEventListener("keydown", function(e) {
                    var x = document.getElementById(this.id + "autocomplete-list");
                    if (x) x = x.getElementsByTagName("div");
                    if (e.keyCode == 40) {
                        currentFocus++;
                        addActive(x);
                    } else if (e.keyCode == 38) {
                        currentFocus--;
                        addActive(x);
                    } else if (e.keyCode == 13) {
                        e.preventDefault();
                        if (currentFocus > -1) {
                            if (x) x[currentFocus].click();
                        }
                    }
                });

                function addActive(x) {
                    if (!x) return false;
                    removeActive(x);
                    if (currentFocus >= x.length) currentFocus = 0;
                    if (currentFocus < 0) currentFocus = (x.length - 1);
                    x[currentFocus].classList.add("autocomplete-active");
                }

                function removeActive(x) {
                    for (var i = 0; i < x.length; i++) {
                        x[i].classList.remove("autocomplete-active");
                    }
                }

                function closeAllLists(elmnt) {
                    var x = document.getElementsByClassName("autocomplete-items");
                    for (var i = 0; i < x.length; i++) {
                        if (elmnt != x[i] && elmnt != inp) {
                            x[i].parentNode.removeChild(x[i]);
                        }
                    }
                }
                document.addEventListener("click", function(e) {
                    closeAllLists(e.target);
                });
            }
        </script>



        <script>
            $(function() {
                $('.selectpicker').selectpicker();
            });
        </script>
        <script>
            $(document).ready(function() {
                console.log('asdas');
                $('#table1').DataTable();
            });
        </script>
        <script>
            $('#selectcountry').change(function() {
                var id = $(this).val();
                console.log('select-country', id)
                if (id) {
                    $.ajax({
                        type: "GET",
                        url: "getSiswaBayar/" + id,
                        dataType: 'JSON',
                        success: function(res) {
                            console.log(res, 'ambil data');
                            if (res) {
                                $("#bulan_pembayaran").empty();
                                $("#dengan-rupiah").empty();
                                // $("#kelas").val(res.nis);
                                $.each(res, function(key, value) {
                                    $('#bulan_pembayaran').append('<option value="' + value.id +
                                        '">' + value.nama_keuangan + '</option>');
                                });
                            } else {
                                $("#bulan_pembayaran").empty();
                            }
                        }
                    });
                } else {
                    $("#bulan_pembayaran").empty();
                }
            });
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
                                $("#tingkatan_kelas").empty();
                                $("#dengan-rupiah").val(res.jumlah);
                            } else {
                                $("#tingkatan_kelas").empty();
                            }
                        }
                    });
                } else {
                    $("#kelurahan").empty();
                }
            });
            $('#nama_siswa').change(function() {
                var id = $(this).val();
                console.log('nama_siswa e', id)
                if (id) {
                    $.ajax({
                        type: "GET",
                        url: "getPembayaran?id=" + id,
                        dataType: 'JSON',
                        success: function(res) {
                            console.log(res);
                            if (res) {
                                $("#tingkatan_kelas").empty();
                                $("#dengan-rupiah").val(res.jumlah);
                            } else {
                                $("#tingkatan_kelas").empty();
                            }
                        }
                    });
                } else {
                    $("#kelurahan").empty();
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
