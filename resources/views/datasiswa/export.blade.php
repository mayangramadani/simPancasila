<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Daftar siswa</title>
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
                        <div class="row text-center mb-4">
                            <!-- Start .row -->
                            <div class="col-lg-3">
                                <!-- col-lg-6 start here -->
                                <div class="sidebar-brand-icon logo-brand">
                                    <img src="{!! asset('asset/img/Logo.png') !!}" alt="" width="100px">
                                </div>
                            </div>
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-7">
                                <!-- col-lg-6 start here -->
                                <div class="invoice-from">
                                    <ul class="list-unstyled ">
                                        <li>Yayasan Sinar Pancasila</li>
                                        <li>Jl. Telaga Sari No.13, RT.31, Telaga Sari, Kec. Balikpapan Kota, </li>
                                        <li>Kota Balikpapan, Kalimantan Timur 76112</li>
                                        <li>(0542) 732849</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-5">
                           <p class="text-right"><strong>Balikpapan </strong> {{ date('d M Y') }}</p>
                        </div>

                        <!-- col-lg-6 end here -->

                        <div class="col-lg-12">
                            <!-- col-lg-12 start here -->

                            <div class="invoice-items">
                                <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%" class="text-center">No.</th>
                                                <th class="per70 text-center">Nama Siswa</th>
                                                <th class="per8 text-center">NIS</th>
                                                <th class="per20 text-center">Sekolah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswa as $item)
                                                <tr role="row" class="odd">
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama_siswa }}</td>
                                                    <td class="text-center">{{ $item->nis }}</td>
                                                    <td class="text-center">{{ $item->Sekolah->nama_sekolah }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                            <div class="invoice-footer mt25">
                                <p class="text-center">{{ date('d M Y') }} <a onclick="window.print();return false;"
                                        href="#" class="btn btn-default ml15"><i class="fa fa-print mr5"></i>
                                        Print</a></p>
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
