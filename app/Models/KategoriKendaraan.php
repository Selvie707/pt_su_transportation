<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKendaraan extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan (optional, jika tidak sesuai dengan plural form)
    protected $table = 'kategori_kendaraan';

    // Tentukan kolom yang dapat diisi
    protected $fillable = ['nama'];

    // Relasi satu ke banyak dengan kendaraan
    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'kategori_id');
    }
}