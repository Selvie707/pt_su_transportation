<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\KategoriKendaraan;
use Illuminate\Database\Seeder;

class KategoriKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriKendaraan::create(['nama' => 'Tronton']);
        KategoriKendaraan::create(['nama' => 'Trailer']);
        KategoriKendaraan::create(['nama' => 'Truk']);
    }
}
