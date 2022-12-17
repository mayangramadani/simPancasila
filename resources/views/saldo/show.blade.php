<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Laporan Keuangan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        .print {
            visibility: visible;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container bootdey">
        <div class="row invoice row-printable">
            <div class="col-md-10">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default plain" id="dash_0">
                    <!-- Start .panel -->
                    <div class="panel-body p30">
                        <div class="row">
                            <!-- Start .row -->
                            <div class="col-lg-3">
                                <!-- col-lg-6 start here -->
                                <div class="sidebar-brand-icon logo-brand">
                                    <img src="{!! asset('asset/img/Logo.png') !!}" alt=""
                                        width="100px
                                    
                                    ">
                                </div>
                            </div>
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-7">
                                <!-- col-lg-6 start here -->
                                <div class="invoice-from">
                                    <ul class="list-unstyled text-center">
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
                                            <li><strong>Laporan Keuangan</strong> </li>
                                            <li><strong>Sekolah:</strong></li>
                                            <li><strong>Due Date:</strong></li>
                                            <li><strong>Status:</strong>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="invoice-to mt25">
                                    <ul class="list-unstyled">
                                        <li><strong>Invoiced To</strong></li>
                                        <li>Keuangan Sekolah</li>
                                        <li></li>
                                        <li>Sinar Pancasila</li>
                                        <li>Balikpapan</li>
                                    </ul>
                                </div>
                                <div class="invoice-items">
                                    <div class="table-responsive" style="overflow: hidden; outline: none;"
                                        tabindex="0">
                                        <table class="table table-bordered" > 
                                            <thead>
                                                <tr>
                                                    <th width="4%" class="text-center">No.</th>
                                                    <th class="per40 text-center">Pemasukan</th>
                                                    <th class="per40 text-center">Pengeluaran</th>
                                                    <th class="per19 text-center">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                @foreach ($saldo as $item)
                                                   
                                                    <tr role="row" class="odd" >
                                                        <td ></td>
                                                        <td>{{ 'Rp ' . number_format($item->debit, 0, '.', '.') }}</td>
                                                        <td>{{ 'Rp ' . number_format($item->kredit, 0, '.', '.') }}</td>
                                                        <td class="text-center">
                                                            {{ 'Rp ' . number_format($item->saldo, 0, '.', '.') }}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            {{-- <tfoot>
                                                <tr>
                                                    <th class="text-center"></th>
                                                    <th colspan="2" class="text-right">Total Pemasukan:</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">
                                                    </th>
                                                    <th colspan="2" class="text-right">Total Pengeluaran:</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">
                                                    </th>

                                                    <th colspan="2" class="text-right">Sisa:</th>
                                                    <th class="text-center">{{ 'Rp ' . number_format($item->saldo, 0, '.', '.') }}

                                                    </th>
                                                </tr>
                                            </tfoot> --}}
                                        </table>

                                    </div>
                                </div>
                                {{-- <div class="invoice-footer mt25">
                                    <p class="text-center">Generated on Monday, October 08th, 2015 <a href="#"
                                            class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a></p>
                                </div> --}}
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
