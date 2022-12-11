<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Daftar Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container bootdey">
        <div class="row invoice row-printable">
            <div class="col-md-10">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default plain" id="dash_0">
                    <!-- Start .panel -->
                    <div class="panel-body p30">
                        <div class="row">
                            <!-- Start .row -->
                            <div class="col-lg-6">
                                <!-- col-lg-6 start here -->
                                <div class="sidebar-brand-icon logo-brand">
                                    <img src="{!! asset('asset/img/Logo.png') !!}" alt=""
                                        width="100px
                                    
                                    ">
                                </div>
                            </div>
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-6">
                                <!-- col-lg-6 start here -->
                                <div class="invoice-from">
                                    <ul class="list-unstyled text-right">
                                        <li>Yayasan Sinar Pancasila</li>
                                        <li>Jl. Telaga Sari No.13, RT.31, Telaga Sari, Kec. Balikpapan Kota, </li>
                                        <li>Kota Balikpapan, Kalimantan Timur 76112</li>
                                        <li>(0542) 732849</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-12">
                                <!-- col-lg-12 start here -->
                                <div class="invoice-details mt25">
                                    <div class="well">

                                        <ul class="list-unstyled mb0">
                                            <li><strong class="text-info">Daftar Nama-Nama Siswa di
                                                    {{ request()->parameters }} </strong></li>
                                            <li><strong>Sekolah: {{$kelas->TingkatanKelas->Sekolah->nama_sekolah}}</strong></li>
                                            <li><strong>Kelas: {{$kelas->nama_kelas}}</strong> </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="invoice-to mt25">
                                    <ul class="list-unstyled">
                                        <li><strong>Daftar Siswa</strong></li>
                                    </ul>
                                </div>
                                <div class="invoice-items">
                                    <div class="table-responsive" style="overflow: hidden; outline: none;"
                                        tabindex="0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="per2 text-center">No.</th>
                                                    <th class="per37 text-center">Nis</th>
                                                    <th class="per40 text-center">Nama Siswa</th>
                                                    <th class="per20 text-center">Kelas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($datakelas != null)
                                                    @foreach ($datakelas as $ds)
                                                        <tr role="row" class="odd">
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td>{{ $ds->Siswa->nis }}</td>
                                                            <td>{{ $ds->Siswa->nama_siswa }}</td>
                                                            <td class="text-center">{{ $ds->Kelas}}</td>
                                                        </tr>

                                                    @endforeach
                                                @endif
                                                <tr role="row" class="odd">
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-center"></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="invoice-footer mt25">
                                    <p class="text-center">Generated on Monday, October 08th, 2015 <a href="#"
                                            class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a></p>
                                </div>
                            </div>
                            <!-- col-lg-12 end here -->
                        </div>
                        <!-- End .row -->
                    </div>
                </div>
                <!-- End .panel -->
            </div>
            <!-- col-lg-12 end here -->
        </div>
    </div>

    <style type="text/css">
        body {
            margin-top: 10px;
            background: #eee;
        }
    </style>

    <script type="text/javascript"></script>
</body>

</html>
