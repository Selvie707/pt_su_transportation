<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kendaraan::create([
            'merk' => 'Toyota',
            'status' => 'aktif',
            'kategori_id' => 1, // Pastikan kategori_id valid (misalnya, id kategori yang ada)
            'nomor_kendaraan' => 'B1234XYZ',
            'deskripsi' => 'Kendaraan pribadi',
        ]);

        Kendaraan::create([
            'merk' => 'Honda',
            'status' => 'tidak aktif',
            'kategori_id' => 2, // Ganti dengan id kategori yang valid
            'nomor_kendaraan' => 'A5678ABC',
            'deskripsi' => 'Kendaraan operasional',
        ]);
    }
}
