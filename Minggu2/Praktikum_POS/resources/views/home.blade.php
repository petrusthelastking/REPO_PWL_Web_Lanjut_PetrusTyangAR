@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <div class="text-center">
    <h1 class="text-4xl font-bold text-gray-800 animate__animated animate__fadeInUp">Selamat Datang di POS App</h1>
    <p class="mt-4 text-xl text-gray-600 animate__animated animate__fadeInUp animate__delay-1s">
      Solusi cerdas untuk pengelolaan Point of Sales Anda.
    </p>
    <div class="mt-8">
      <a href="/sales" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-full shadow-lg transition-all duration-300 animate__animated animate__zoomIn animate__delay-2s">
        Mulai Transaksi
      </a>
    </div>
  </div>
@endsection
