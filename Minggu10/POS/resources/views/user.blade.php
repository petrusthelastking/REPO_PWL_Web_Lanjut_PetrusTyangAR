{{------------------------------------------------JOBSHEET 2 --------------------------------------------------}}
{{-- @extends('layouts.app')

@section('title', 'User Profile')

@section('content')
  <div class="mt-8 bg-white p-6 rounded-lg shadow-lg animate__animated animate__fadeInUp">
    <h1 class="text-3xl font-bold mb-4 text-gray-800">Profil Pengguna</h1>
    <p class="text-lg text-gray-700">ID: <span class="font-medium">{{ $id }}</span></p>
    <p class="text-lg text-gray-700">Nama: <span class="font-medium">{{ $name }}</span></p>
  </div>
@endsection --}}

{{-- --------------------------------Jobsheet 4---------------------------------------------- --}}
            {{-- <table border="1" cellpadding="2" cellspacing="0"> --}}

                {{-- ---------------------------------Praktikum 2.1-------------------------------------------- --}}
                {{-- <tr> --}}
                    {{-- <th>ID</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>ID Level Pengguna</th> --}}
                {{-- </tr> --}}
                {{-- <tr> --}}
                    {{-- Menampilkan array asoc dengan 1 data  --}}
                    {{-- <td>{{ $data->user_id }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->level_id }}</td> --}}
                {{-- </tr> --}}

                {{-- -------------------------------Praktikum 2.3-------------------------------------- --}}
                {{-- <tr> --}}
                    {{-- <th>Jumlah Pengguna</th> --}}
                {{-- </tr> --}}
                {{-- <tr> --}}
                    {{-- <td>{{ $data }}</td> --}}
                {{-- </tr> --}}


                {{-- -------------------------------Praktikum 2.4-------------------------------------- --}}
                {{-- <tr> --}}
                    {{-- <th>ID</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>ID Level Pengguna</th> --}}
                {{-- </tr> --}}
                {{-- <tr> --}}
                    {{-- <td>{{ $data->user_id }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->level_id }}</td> --}}
                {{-- </tr> --}}
            {{-- </table> --}}

            {{-- -------------------------------Praktikum 2.6-------------------------------------- --}}
            {{-- <a href="/user/tambah">+ Tambah User</a>
            <table border="1" cellpadding="2" cellspacing="0">
                <tr>
                    <td>ID</td>
                    <td>Username</td>
                    <td>Nama</td>
                    <td>ID Level Pengguna</td>
                    <td>Aksi</td>
                </tr>
                @foreach ($data as $d)
                <tr>
                    <td>{{ $d->user_id }}</td>
                    <td>{{ $d->username }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->level_id }}</td>
                    <td>
                        <a href="/user/ubah/{{ $d->user_id }}">Ubah</a> |
                        <a href="/user/hapus/{{ $d->user_id }}">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </table> --}}

            {{-- -------------------------------Praktikum 2.7-------------------------------------- --}}
            <a href="/user/tambah">+ Tambah User</a>
            <table border="1" cellpadding="2" cellspacing="0">
                <tr>
                    <td>ID</td>
                    <td>Username</td>
                    <td>Nama</td>
                    <td>ID Level Pengguna</td>
                    <td>Kode Level</td>
                    <td>Nama Level</td>
                    <td>Aksi</td>
                </tr>
                @foreach ($data as $d)
                <tr>
                    <td>{{ $d->user_id }}</td>
                    <td>{{ $d->username }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->level_id }}</td>
                    <td>{{ $d->level->level_kode }}</td>
                    <td>{{ $d->level->level_nama }}</td>
                    <td>
                        <a href="/user/ubah/{{ $d->user_id }}">Ubah</a> |
                        <a href="/user/hapus/{{ $d->user_id }}">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </table>
</body>
</html>
          