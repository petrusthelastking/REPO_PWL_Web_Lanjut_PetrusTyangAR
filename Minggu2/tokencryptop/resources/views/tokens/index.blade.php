<!DOCTYPE html>
<html>
<head>
    <title>Daftar Token Cryptop</title>
</head>
<body>
    <h1>Daftar Token Cryptop</h1>

    <!-- PENTING: Link untuk menambahkan token baru -->
    <a href="{{ route('tokens.create') }}">Tambah Token Baru</a>

    <!-- PENTING: Tampilkan pesan sukses jika ada -->
    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <!-- PENTING: Tabel daftar token -->
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Token</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        @foreach ($tokens as $token)
        <tr>
            <td>{{ $token->id }}</td>
            <td>{{ $token->name }}</td>
            <td>{{ $token->price }}</td>
            <td>{{ $token->quantity }}</td>
            <td>
                <!-- PENTING: Tautan untuk detail, edit, dan form hapus token -->
                <a href="{{ route('tokens.show', $token->id) }}">Detail</a>
                <a href="{{ route('tokens.edit', $token->id) }}">Edit</a>
                <form action="{{ route('tokens.destroy', $token->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus token ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
