<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Receipt page - Bootdey.com</title>
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
                                <div><img src="{{ asset('asset/img/Logo.png') }}"
                                        class="img-fluid" alt="">
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
                                            <li><strong>Invoice</strong> {{ $transaksisiswa->no_transaksi }}</li>
                                            <li><strong>Invoice Date:</strong> {{ $transaksisiswa->tanggal }}</li>
                                            <li><strong>Due Date:</strong> {{ $transaksisiswa->tanggal }}</li>
                                            <li><strong>Status:</strong> <span
                                                    class="label label-danger">{{ $transaksisiswa->status_pembayaran }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="invoice-to mt25">
                                    <ul class="list-unstyled">
                                        <li><strong>Invoiced To</strong></li>
                                        <li>{{ $transaksisiswa->User->name }}</li>
                                        <li>{{ $transaksisiswa->User->Siswa->Sekolah->nama_sekolah }}</li>
                                        <li>New York, NY, 2014</li>
                                        <li>USA</li>
                                    </ul>
                                </div>
                                <div class="invoice-items">
                                    <div class="table-responsive" style="overflow: hidden; outline: none;"
                                        tabindex="0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="per70 text-center">Description</th>
                                                    <th class="per5 text-center">Qty</th>
                                                    <th class="per25 text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" class="odd">
                                                    <td>{{ $transaksisiswa->nama_keuangan }}</td>
                                                    <td class="text-center">1</td>
                                                    <td>{{ 'Rp ' . number_format($transaksisiswa->jumlah, 0, '.', '.') }}
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2" class="text-right">Sub Total:</th>
                                                    <th class="text-center">
                                                        {{ 'Rp ' . number_format($transaksisiswa->jumlah, 0, '.', '.') }}
                                                    </th>
                                                </tr>
                                                {{-- <tr>
                                                    <th colspan="2" class="text-right">20% VAT:</th>
                                                    <th class="text-center">00</th>
                                                </tr> --}}
                                                <tr>
                                                    <th colspan="2" class="text-right">Credit:</th>
                                                    <th class="text-center">00</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" class="text-right">Total:</th>
                                                    <th class="text-center">
                                                        {{ 'Rp ' . number_format($transaksisiswa->jumlah, 0, '.', '.') }}
                                                    </th>
                                                </tr>
                                            </tfoot>
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
