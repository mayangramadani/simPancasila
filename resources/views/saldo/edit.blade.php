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
                    <label for="cemail" class="control-label">Nama Sekolah</label>
                    <select class="form-select form-select-lg mb-3 form-control" name="sekolah_id">
                        @foreach ($datasekolah as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                        @endforeach
                    </select>

                    <label for="cemail" class="control-label">Debit</label>
                    <input class="form-control mb-3" type="number" name="debit" placeholder="Debit"
                        value="{{ $saldo->debit }}">
                    <label for="cemail" class="control-label">Kredit</label>
                    <input class="form-control mb-3" type="number" name="kredit" placeholder="kredit"
                        value="{{ $saldo->kredit }}">
                    <label for="cemail" class="control-label">Saldo</label>
                    <input class="form-control mb-3" type="number" name="saldo" placeholder="saldo"
                        value="{{ $saldo->saldo }}">

                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">

                </form>
            </div>
        </div>
    </div>
@endsection
