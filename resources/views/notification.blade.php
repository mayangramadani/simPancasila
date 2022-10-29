@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="pl-3 m-0 font-weight-bold text-primary ">Notification</h4>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pemberitahuan</h5>
                
                            <!-- List group with Advanced Contents -->
                            <div class="list-group">
                               
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">xx</h5>
                                            <small>xx</small>
                                        </div>
                                        <p class="mb-1">Status Permohonan Berubah Menjadi!</p>
                                        {{-- <small>And some small print.</small> --}}
                                    </a>
                               
                            </div><!-- End List group Advanced Content -->
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
