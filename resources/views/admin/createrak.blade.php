@extends('layout.dasar')

@section('konten')

    <form action="{{ url('administrator') }}" method="post">
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" name="judul" id="judul" class="form-control" value="{{ Session::get('judul') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                <div class="col-sm-10">
                    <input type="text" name="penulis" id="penulis" class="form-control" value="{{ Session::get('penulis') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" name="penerbit" id="penerbit" class="form-control" value="{{ Session::get('penerbit') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tahunterbit" class="col-sm-2 col-form-label">Tahun terbit</label>
                <div class="col-sm-10">
                    <input type="text" name="tahunterbit" id="tahunterbit" class="form-control" value="{{ Session::get('tahunterbit') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tahunterbit" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-1"><a href="{{ url('administrator') }}" class="btn btn-primary">Back</a></div>
                <div class="col-sm-1"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>

@endsection