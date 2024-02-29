<?php

namespace App\Http\Controllers;

use App\Models\rakbuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RakbukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = rakbuku::orderBy('idBuku', 'asc')->paginate(20);
        return view('admin.rak')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createrak');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('idBuku', $request->id);
        Session::flash('judul', $request->judul);
        Session::flash('penulis', $request->penulis);
        Session::flash('penerbit', $request->penerbit);
        Session::flash('tahunterbit', $request->tahunterbit);

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required',
        ],[
            'judul.required' => 'Judul wajib di isi',
            'penulis.required' => 'penulis wajib di isi',
            'penerbit.required' => 'penerbit wajib di isi',
            'tahunterbit.required' => 'tahun terbit wajib di isi',
        ]);

        $data = [
            'idBuku' => $request->id,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
        ];

        rakbuku::create($data);
        return redirect('administrator')->with('success', 'Berhasil menambahkan data');

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
        $data = rakbuku::where('idBuku', $id)->first();
        return view('admin.editrak')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required',
        ],[
            'judul.required' => 'Judul wajib di isi',
            'penulis.required' => 'penulis wajib di isi',
            'penerbit.required' => 'penerbit wajib di isi',
            'tahunterbit.required' => 'tahun terbit wajib di isi',
        ]);

        $data = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
        ];

        Rakbuku::where('idbuku',$id)->update($data);
        return redirect()->to('administrator')->with('success', 'Berhasil mengedit data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        rakbuku::where('idBuku', $id)->delete();
        return redirect()->to('administrator')->with('success', 'Berhasil menghapus data');
    }
}
