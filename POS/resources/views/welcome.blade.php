{{-- @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
{{-- @stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop --}}

@extends('layouts.template')

@section('content')
  {{-- Ringkasan data --}}
  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $userCount }}</h3>
          <p>Data User</p>
        </div>
        <div class="icon"><i class="fas fa-users"></i></div>
        <a href="{{ url('user') }}" class="small-box-footer">
          Selengkapnya <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $levelCount }}</h3>
          <p>Level User</p>
        </div>
        <div class="icon"><i class="fas fa-layer-group"></i></div>
        <a href="{{ url('level') }}" class="small-box-footer">
          Selengkapnya <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $kategoriCount }}</h3>
          <p>Kategori Barang</p>
        </div>
        <div class="icon"><i class="fas fa-bookmark"></i></div>
        <a href="{{ url('kategori') }}" class="small-box-footer">
          Selengkapnya <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $barangCount }}</h3>
          <p>Data Barang</p>
        </div>
        <div class="icon"><i class="fas fa-list-alt"></i></div>
        <a href="{{ url('barang') }}" class="small-box-footer">
          Selengkapnya <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $stokCount }}</h3>
          <p>Stok Barang</p>
        </div>
        <div class="icon"><i class="fas fa-cubes"></i></div>
        <a href="{{ url('stok') }}" class="small-box-footer">
          Selengkapnya <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-6 col-12">
      <div class="small-box bg-secondary">
        <div class="inner">
          <h3>{{ $penjualanCount }}</h3>
          <p>Transaksi Penjualan</p>
        </div>
        <div class="icon"><i class="fas fa-cash-register"></i></div>
        <a href="{{ url('penjualan') }}" class="small-box-footer">
          Selengkapnya <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  </div>

  {{-- Grafik --}}
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><h3 class="card-title">Penjualan 7 Hari Terakhir</h3></div>
        <div class="card-body">
          <canvas id="salesChart" height="200"></canvas>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <div class="card-header"><h3 class="card-title">Distribusi Kategori</h3></div>
        <div class="card-body">
          <canvas id="kategoriChart" height="200"></canvas>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><h3 class="card-title">Stok per Barang</h3></div>
        <div class="card-body">
          <canvas id="stokChart" height="200"></canvas>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const labels          = @json($labels);
  const dataSales       = @json($dataSales);
  const kategoriLabels  = @json($kategoriLabels);
  const kategoriCounts  = @json($kategoriCounts);
  const barangLabels    = @json($barangLabels);
  const barangStok      = @json($barangStok);

  console.log({ labels, dataSales, kategoriLabels, kategoriCounts, barangLabels, barangStok });

  new Chart(document.getElementById('salesChart'), {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'Jumlah Penjualan',
        data: dataSales,
        fill: false,
        tension: 0.4,
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          precision: 0
        }
      }
    }
  });

  new Chart(document.getElementById('kategoriChart'), {
    type: 'pie',
    data: {
      labels: kategoriLabels,
      datasets: [{
        data: kategoriCounts,
        backgroundColor: [
          'rgba(255, 99, 132, 0.7)',
          'rgba(54, 162, 235, 0.7)',
          'rgba(255, 206, 86, 0.7)',
          'rgba(75, 192, 192, 0.7)'
        ],
        borderWidth: 1
      }]
    },
    options: { responsive: true }
  });

  new Chart(document.getElementById('stokChart'), {
    type: 'bar',
    data: {
      labels: barangLabels,
      datasets: [{
        label: 'Jumlah Stok',
        data: barangStok,
        backgroundColor: 'rgba(153, 102, 255, 0.7)'
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true }
      }
    }
  });
</script>
@endpush
