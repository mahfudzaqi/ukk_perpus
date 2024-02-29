<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = ['idBuku', 'id', 'tanggalpeminjaman', 'tanggalpengembalian', 'statuspeminjaman'];
    protected $table = 'peminjaman';
    public $timestamps = false; // Biarkan atau hapus jika ingin menggunakan timestamps

    public function buku() {
        return $this->belongsTo('App\Models\rakbuku', 'idBuku');
    }
}
