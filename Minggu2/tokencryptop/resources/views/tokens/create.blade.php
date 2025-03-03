<!DOCTYPE html>
<html>
<head>
    <title>Tambah Token Cryptop</title>
</head>
<body>
    <h1>Tambah Token Cryptop</h1>
    <!-- Form untuk menyimpan token baru -->
    <form action="{{ route('tokens.store') }}" method="POST">
        @csrf<!-- CSRF token untuk keamanan -->
        <label>Nama Token:</label>
        <input type="text" name="name" required>
        <br>
        <label>Harga Token:</label>
        <input type="number" name="price" step="0.01" required>
        <br>
        <label>Jumlah Token:</label>
        <input type="number" name="quantity" required>
        <br>
        <label>Deskripsi:</label>
        <textarea name="description"></textarea>
        <br>
        <!-- PENTING: Tombol submit untuk mengirim data -->
        <button type="submit">Simpan</button>
    </form>
    <!-- PENTING: Link untuk kembali ke daftar token -->
    <a href="{{ route('tokens.index') }}">Kembali</a>
</body>
</html>
