<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rakbuku extends Model
{
    use HasFactory;
    protected $fillable = ['judul','penulis','penerbit','tahunterbit'];
    protected $table = 'rakbuku';
    public $timestamps = false;

    public function pinjam() {
        return $this->hasOne('App\Models\peminjaman');
    }

}
