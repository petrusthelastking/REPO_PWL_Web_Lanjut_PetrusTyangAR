<!DOCTYPE html>
<html>
<head>
    <title>Detail Token Cryptop</title>
</head>
<body>
    <h1>Detail Token Cryptop</h1>
    <!-- PENTING: Menampilkan detail token -->
    <p><strong>Nama Token:</strong> {{ $token->name }}</p>
    <p><strong>Harga Token:</strong> {{ $token->price }}</p>
    <p><strong>Jumlah Token:</strong> {{ $token->quantity }}</p>
    <p><strong>Deskripsi:</strong> {{ $token->description }}</p>
    <!-- PENTING: Tautan kembali ke halaman daftar token -->
    <a href="{{ route('tokens.index') }}">Kembali</a>
</body>
</html>
