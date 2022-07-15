@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Saldo</h1>
        </div>
        <div class="form-group  mt-4">
            <div class="col-lg-4">
                <form action="/saldo/{{ $saldo->id }}" method="POST">
                    @method('put')
                    @csrf
                    <label for="cemail" class="control-label">Sekolah</label>
                    <select class="form-select form-select-lg form-control" name="sekolah_id">
                        <option>=== Pilih Sekolah ===</option>
                        @foreach ($sekolah as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_sekolah }}
                            </option>
                        @endforeach
                    </select>


                    <label for="cemail" class="control-label">Debit</label>
                    <input class="form-control mb-3" type="number" name="debit" placeholder="Debit">

                    <label for="cemail" class="control-label">Kredit</label>
                    <input class="form-control mb-3" type="number" name="kredit" placeholder="Kredit">

                    <label for="cemail" class="control-label">Saldo</label>
                    <input class="form-control mb-3" type="number" min="0" name="saldo"
                        placeholder="Saldo">

                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">

                </form>
            </div>
        </div>
    </div>
@endsection
