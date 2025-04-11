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

{{------------------------------------------------JOBSHEET 3 --------------------------------------------------}}
<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->user_id }}</td>
            <td>{{ $d->username }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->level_id }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>