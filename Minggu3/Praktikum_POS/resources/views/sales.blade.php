@extends('layouts.app')

@section('title', 'Sales')

@section('content')
  <div class="mt-8 bg-white p-6 rounded-lg shadow-lg animate__animated animate__fadeInUp">
    <h1 class="text-3xl font-bold text-center text-gray-800">Transaksi POS</h1>
    <p class="mt-4 text-xl text-gray-600 text-center">Detail transaksi dan proses POS akan ditampilkan di sini.</p>
    <div class="mt-8 text-center">
      <a href="#" class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-full shadow-lg transition-all duration-300 animate__animated animate__zoomIn">
        Mulai Transaksi
      </a>
    </div>
  </div>
@endsection
