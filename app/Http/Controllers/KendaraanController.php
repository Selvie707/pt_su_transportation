<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\KategoriKendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return view('dashboard', compact('kendaraans'));
    }

    // Menampilkan form untuk menambah kendaraan
    public function create()
    {
        $kategoris = KategoriKendaraan::all(); // Ambil data kategori
        return view('tambah_kendaraan', compact('kategoris'));
    }

    // Menyimpan kendaraan ke database
    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required|max:100',
            'status' => 'required|in:aktif,tidak aktif',
            'kategori_id' => 'required|exists:kategori_kendaraan,id',
            'nomor_kendaraan' => 'required|max:20',
            'deskripsi' => 'nullable',
        ]);

        Kendaraan::create([
            'merk' => $request->merk,
            'status' => $request->status,
            'kategori_id' => $request->kategori_id,
            'nomor_kendaraan' => $request->nomor_kendaraan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit kendaraan
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id); // Ambil data kendaraan berdasarkan ID
        $kategoris = KategoriKendaraan::all();  // Ambil data kategori
        return view('edit_kendaraan', compact('kendaraan', 'kategoris'));
    }

    // Memperbarui data kendaraan
    public function update(Request $request, $id)
    {
        $request->validate([
            'merk' => 'required|max:100',
            'status' => 'required|in:aktif,tidak aktif',
            'kategori_id' => 'required|exists:kategori_kendaraan,id',
            'nomor_kendaraan' => 'required|max:20',
            'deskripsi' => 'nullable',
        ]);

        $kendaraan = Kendaraan::findOrFail($id); // Ambil data kendaraan berdasarkan ID
        $kendaraan->update([
            'merk' => $request->merk,
            'status' => $request->status,
            'kategori_id' => $request->kategori_id,
            'nomor_kendaraan' => $request->nomor_kendaraan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $kendaraan->delete();

        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan berhasil dihapus!');
    }
}
