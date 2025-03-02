<!DOCTYPE html>
<html>
<head>
    <title>Edit Token Cryptop</title>
</head>
<body>
    <h1>Edit Token Cryptop</h1>
    <!-- Form untuk memperbarui token -->
    <form action="{{ route('tokens.update', $token->id) }}" method="POST">
        @csrf <!-- CSRF protection -->
        @method('PUT') <!-- Spoofing method PUT -->
        <label>Nama Token:</label>
        <input type="text" name="name" value="{{ $token->name }}" required>
        <br>
        <label>Harga Token:</label>
        <input type="number" name="price" step="0.01" value="{{ $token->price }}" required>
        <br>
        <label>Jumlah Token:</label>
        <input type="number" name="quantity" value="{{ $token->quantity }}" required>
        <br>
        <label>Deskripsi:</label>
        <textarea name="description">{{ $token->description }}</textarea>
        <br>
        <!-- Tombol submit untuk mengirim data update -->
        <button type="submit">Update</button>
    </form>
    <!-- Link kembali ke daftar token -->
    <a href="{{ route('tokens.index') }}">Kembali</a>
</body>
</html>
