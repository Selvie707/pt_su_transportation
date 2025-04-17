<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    
    protected $table = 'kendaraan';
    
    protected $fillable = [
        'merk',
        'status',
        'kategori_id',
        'nomor_kendaraan',
        'deskripsi',
    ];
    
    public function kategori()
    {
        return $this->belongsTo(KategoriKendaraan::class, 'kategori_id');
    }
}