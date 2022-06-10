@extends('layouts.main')
@section('container')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Kelas</h1>
        </div>
        <div class="form-group  mt-4">
            <div class="col-lg-4">
                <form action="/datakelas/{{ $datakelas->id }}" method="POST">
                    @method('put')
                    @csrf
                    <label for="cemail" class="control-label">Nama Kelas</label>
                    <input class="form-control mb-3" type="text" name="nama_kelas" placeholder="Nama Kelas" value="{{ $datakelas->nama_kelas }}">

                    <label for="cemail" class="control-label">Tingkatan Kelas</label>
                    <select class="form-select form-select-lg mb-3 form-control" name="tingkatan_kelas">
                        <option value="Kelas 8" @if ($datakelas->tingkatan_kelas == "Kelas 8") selected @endif>Kelas 8</option>
                        <option value="Kelas 7" @if ($datakelas->tingkatan_kelas == "Kelas 7") selected @endif>Kelas 7</option>
                        <option value="Kelas 9" @if ($datakelas->tingkatan_kelas == "Kelas 9") selected @endif>Kelas 9</option>
                        <option value="Ekstrakurikuler" @if ($datakelas->tingkatan_kelas == "Ekstrakurikuler") selected @endif>Ekstrakurikuler</option>
                        <option value="Bimbel" @if ($datakelas->tingkatan_kelas == "Bimbel") selected @endif>Bimbel</option>
                    </select>
                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                    
                </form>
            </div>
        </div>
    </div>
      

@endsection