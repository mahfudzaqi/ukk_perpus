<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = ['idBuku', 'tanggalpeminjaman', 'tanggalpengembalian', 'statuspeminjaman'];
    protected $table = 'peminjaman';
    public $timestamps = false; // Biarkan atau hapus jika ingin menggunakan timestamps

    public function buku() {
        return $this->belongsTo(RakBuku::class, 'judul');
        // Pastikan 'judul' sesuai dengan kunci luar yang benar dalam tabel 'peminjaman'
    }
}
