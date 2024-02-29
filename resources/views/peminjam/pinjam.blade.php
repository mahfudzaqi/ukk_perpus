@extends('layout.dasar')
<!-- START DATA -->
@section('konten')    
<div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('peminjam') }}" method="get">
              <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Cari</button>
          </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href="{{ url('peminjam/create') }}" class="btn btn-primary">+ Tambah Data</a>
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">idPinjaman</th>
                    <th class="col-2">idBuku</th>
                    <th class="col-3">Tanggal peminjaman</th>
                    <th class="col-3">Tanggal Pengembalian</th>
                    <th class="col-2">Status</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->idPinjaman }}</td>
                        <td>{{ $item->idBuku}}</td>
                        <td>{{ $item->tanggalpeminjaman }}</td>
                        <td>{{ $item->tanggalpengembalian }}</td>
                        <td>{{ $item->statuspeminjaman }}</td>
                        <td>
                            <a href="{{ url('peminjam/'. $item->idPinjaman .'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus data?')" action="{{ url('peminjam/'.$item->idPinjaman) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div><a href="/logout" class="btn btn-sm btn-primary">Logout >></a></div>
@endsection
<!-- AKHIR DATA -->
