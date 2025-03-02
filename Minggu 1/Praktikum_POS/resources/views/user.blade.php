@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
  <div class="mt-8 bg-white p-6 rounded-lg shadow-lg animate__animated animate__fadeInUp">
    <h1 class="text-3xl font-bold mb-4 text-gray-800">Profil Pengguna</h1>
    <p class="text-lg text-gray-700">ID: <span class="font-medium">{{ $id }}</span></p>
    <p class="text-lg text-gray-700">Nama: <span class="font-medium">{{ $name }}</span></p>
  </div>
@endsection
