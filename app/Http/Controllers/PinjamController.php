<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = peminjaman::with('buku')->get();
        $data = peminjaman::orderBy('idPinjaman', 'asc')->get();
        return view('peminjam.pinjam', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjam.pinjamcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('idPinjaman', $request->id);
        Session::flash('idBuku', $request->idBuku);
        Session::flash('tanggalpeminjaman', $request->tanggalpeminjaman);
        Session::flash('tanggalpengembalian', $request->tanggalpengembalian);
        Session::flash('statuspeminjaman', $request->statuspeminjaman);

        $request->validate([
            'idBuku' => 'required',
            'tanggalpeminjaman' => 'required',
            'tanggalpengembalian' => 'required',
            'statuspeminjaman' => 'required',
        ],[
            'idBuku.required' => 'idBuku wajib di isi',
            'tanggalpeminjaman.required' => 'tanggal peminjaman wajib di isi',
            'tanggalpengembalian.required' => 'tanggal pengembalian wajib di isi',
            'statuspeminjaman.required' => 'Status wajib di isi',
        ]);

        $data = [
            'idPinjaman' => $request->id,
            'idBuku' => $request->idBuku,
            'tanggalpeminjaman' => $request->tanggalpeminjaman,
            'tanggalpengembalian' => $request->tanggalpengembalian,
            'statuspeminjaman' => $request->statuspeminjaman,
        ];

        peminjaman::create($data);
        return redirect('peminjam')->with('success', 'Berhasil menambahkan data');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = peminjaman::where('idPinjaman', $id)->first();
        return view('Peminjam.pinjam')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi ID
    $request->validate([
        'idBuku' => 'required',
        'tanggalpeminjaman' => 'required',
        'tanggalpengembalian' => 'required',
        'statuspeminjaman' => 'required',
    ], [
        'idBuku.required' => 'idBuku wajib di isi',
        'tanggalpeminjaman.required' => 'tanggal peminjaman wajib di isi',
        'tanggalpengembalian.required' => 'tanggal pengembalian wajib di isi',
        'statuspeminjaman.required' => 'Status wajib di isi',
    ]);

    // Pembaruan Data
    $data = [
        'idPinjaman' => $request->id,
        'idBuku' => $request->idBuku,
        'tanggalpeminjaman' => $request->tanggalpeminjaman,
        'tanggalpengembalian' => $request->tanggalpengembalian,
        'statuspeminjaman' => $request->statuspeminjaman,
    ];

    // Update data berdasarkan idPinjaman
    peminjaman::where('idPinjaman', $id)->update($data);

    return redirect()->to('peminjam')->with('success', 'Berhasil mengubah data');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        peminjaman::where('idPinjaman', $id)->delete();
        return redirect()->to('peminjam')->with('success', 'Berhasil menghapus data');
    }
}
