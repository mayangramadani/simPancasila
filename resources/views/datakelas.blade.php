@extends('layouts.main')
@section('container')
    <div class="container-fluid">
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
        </div>

        <form class="row g-3">
            <div class="col-auto">
              <label for="staticEmail2" class="visually-hidden">Email</label>
              <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
            </div>
            <div class="col-auto">
              <label for="inputPassword2" class="visually-hidden">Password</label>
              <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
            </div>
          </form>
@endsection