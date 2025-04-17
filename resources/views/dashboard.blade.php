<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Data Kendaraan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">

    <!-- Pesan login -->
    <div class="alert alert-info">
        {{ __("You're logged in!") }}
    </div>

    <!-- Tombol Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger mb-3">Logout</button>
    </form>

    <!-- Daftar Kendaraan -->
    <h1>Daftar Kendaraan</h1>

    <!-- Tombol untuk menambah kendaraan -->
    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary mb-3">Tambah Kendaraan</a>

    <!-- Menampilkan pesan sukses atau error -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Tabel untuk menampilkan kendaraan -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Merk</th>
                <th>Status</th>
                <th>Kategori</th>
                <th>Nomor Kendaraan</th>
                <th>Deskripsi</th>
                <th>Timestamp</th>
                <th>Aksi</th> <!-- Kolom Aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach ($kendaraans as $kendaraan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kendaraan->merk }}</td>
                    <td>{{ $kendaraan->status }}</td>
                    <td>{{ $kendaraan->kategori->nama }}</td> <!-- Menampilkan nama kategori -->
                    <td>{{ $kendaraan->nomor_kendaraan }}</td>
                    <td>{{ $kendaraan->deskripsi ?? 'Tidak ada deskripsi' }}</td> <!-- Menampilkan deskripsi atau pesan default -->
                    <td>{{ $kendaraan->created_at->format('d-m-Y H:i:s') }}</td> <!-- Format timestamp -->
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('kendaraan.edit', $kendaraan->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE') <!-- Menentukan bahwa ini adalah request delete -->
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kendaraan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
