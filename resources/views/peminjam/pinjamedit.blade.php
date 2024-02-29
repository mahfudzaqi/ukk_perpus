@extends('layout.dasar')

@section('konten')

    <form action="{{ route('peminjam.update', ['id' => $items->idPinjaman]) }}" method="post">
        @csrf
        @method('patch')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="tanggalpeminjaman" class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggalpeminjaman" id="tanggalpeminjaman" class="form-control" value="{{ $items->tanggalpeminjaman }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggalpengembalian" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggalpengembalian" id="tanggalpengembalian" class="form-control" value="{{ $items->tanggalpengembalian }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="statuspeminjaman" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="text" name="statuspeminjaman" id="statuspeminjaman" class="form-control" value="{{ $items->statuspeminjaman }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="statuspeminjaman" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-1"><a href="{{ url('peminjam') }}" class="btn btn-primary">Back</a></div>
                <div class="col-sm-1"><button type="submit" class="btn btn-primary" name="submit">Update</button></div>
            </div>
        </div>
    </form>

@endsection