@extends('layouts.app')

@section('title', 'Products')

@section('content')
  <div class="mt-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 animate__animated animate__fadeInDown">
      Daftar Produk: {{ $category }}
    </h1>
    <!-- Navigasi antar kategori -->
    <div class="flex justify-center space-x-4 mt-4">
      <a href="/category/food-beverage" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300 animate__animated animate__fadeIn">Food & Beverage</a>
      <a href="/category/beauty-health" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300 animate__animated animate__fadeIn animate__delay-1s">Beauty & Health</a>
      <a href="/category/home-care" class="px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600 transition duration-300 animate__animated animate__fadeIn animate__delay-2s">Home Care</a>
      <a href="/category/baby-kid" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 transition duration-300 animate__animated animate__fadeIn animate__delay-3s">Baby & Kid</a>
    </div>
    <!-- Contoh daftar produk -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
      <!-- Card produk contoh -->
      <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 animate__animated animate__fadeInUp">
        <h2 class="text-xl font-semibold">Produk 1</h2>
        <p class="mt-2 text-gray-600">Deskripsi singkat mengenai produk 1.</p>
      </div>
      <!-- Tambahkan card produk lainnya sesuai kebutuhan -->
    </div>
  </div>
@endsection
