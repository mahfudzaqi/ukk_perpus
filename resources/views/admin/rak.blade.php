@extends('layout.dasar')
<!-- START DATA -->
@section('konten')    
<div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
          <form class="d-flex" action="" method="get">
              <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Cari</button>
          </form>
        </div>

        <!-- TOMBOL TAMBAH DATA & CETAK DATA -->
        <div class="pb-3">
            <a href="{{ url('administrator/view/pdf') }}" class="btn btn-primary" target="_blank">Cetak Data</a>
            <a href="{{ url('administrator/create') }}" class="btn btn-primary">+ Tambah Data</a>
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">idBuku</th>
                    <th class="col-md-3">Judul</th>
                    <th class="col-md-3">Penulis</th>
                    <th class="col-md-2">Penerbit</th>
                    <th class="col-md-2">Tahun Terbit</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)    
                    <tr>
                        <td>{{ $item->idBuku }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>{{ $item->tahunterbit }}</td>
                        <td>
                            <a href="{{ url('administrator/'. $item->idBuku .'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus data?')" action="{{ url('administrator/'. $item->idBuku) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
    <div><a href="/logout" class="btn btn-sm btn-primary">Logout >></a></div>
@endsection
<!-- AKHIR DATA -->
