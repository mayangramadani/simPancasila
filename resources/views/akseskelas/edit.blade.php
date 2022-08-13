@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Akses Kelas</h1>
        </div>
        <div class="form-group  mt-4">
            <div class="col-lg-4">
                <form action="/datakelas/{{ $akseskelas->id }}" method="POST">
                    @method('put')
                    @csrf
                    <label for="cemail" class="control-label">Nama Siswa</label>
                    <select class="form-select form-select-lg mb-3 form-control" name="siswa_id">
                        @foreach ($siswa as $ni)
                            <option value="{{ $ni->id }}">{{ $ni->nama_siswa }}</option>
                        @endforeach
                    </select>
                    <label for="cemail" class="control-label">Nama Kelas</label>
                    <input class="form-control mb-3" type="text" name="nama_kelas" placeholder="Nama Kelas"
                        value="{{ $datakelas->nama_kelas }}">

                    <label for="cemail" class="control-label">Tahun</label>
                    <input class="form-control mb-3" type="number" name="tahun" min="0" placeholder="Tahun"
                        value="{{ $akseskelas->tahun }}">
                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">

                </form>
            </div>
        </div>
    </div>
@endsection
