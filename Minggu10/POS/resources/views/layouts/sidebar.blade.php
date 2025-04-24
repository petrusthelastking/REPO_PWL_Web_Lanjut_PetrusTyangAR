{{-- resources/views/layouts/sidebar.blade.php --}}
@push('css')
<style>
  /* Sidebar container */
  .sidebar {
    display: flex;
    flex-direction: column;
    background-color: #000000;
    color: #eee;
    min-height: 100vh;
    padding: 1rem;
  }
  /* User panel di atas, Projects akan di tengah, Logout di bawah */
  .sidebar .user-panel {
    margin-bottom: 2rem;
  }
  .sidebar .nav {
    flex: 1; /* isi space */
    display: flex;
    flex-direction: column;
  }
  .nav-header {
    font-size: 0.75rem;
    text-transform: uppercase;
    color: #777;
    margin: 1rem 0 0.5rem;
    padding-left: 0.5rem;
  }
  .nav-item {
    margin: 0.25rem 0;
  }
  .nav-link {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    border-radius: 8px;
    color: #ccc;
    transition: background 0.2s, color 0.2s;
  }
  .nav-link:hover {
    background: #1f1f1f;
    color: #fff;
  }
  .nav-link.active {
    background: #2a2a2a;
    color: #fff;
  }
  .nav-icon {
    margin-right: 0.75rem;
    font-size: 1.1rem;
  }
  /* Badge style */
  .nav-link .badge {
    margin-left: auto;
    background: #ff3b30;
    color: #fff;
    font-size: 0.65rem;
    border-radius: 999px;
    padding: 0.2em 0.5em;
  }
  .badge-new {
    background: #34c759 !important;
  }
  /* Logout di bawah */
  .sidebar .logout {
    margin-top: auto;
    padding-top: 1rem;
  }
  /* Toggle icon (hamburger) at very top */
  .sidebar .toggle-btn {
    display: none; /* implement JS toggle jika perlu */
    margin-bottom: 1rem;
    color: #ccc;
    cursor: pointer;
  }
  /* Responsive: tampilkan toggle di mobile */
  @media (max-width: 768px) {
    .sidebar .toggle-btn {
      display: block;
    }
  }
</style>
@endpush

<div class="sidebar">
  <!-- (Optional) toggle button untuk mobile -->
  <div class="toggle-btn">
    <i class="fas fa-bars"></i>
  </div>

  <!-- User Panel -->
  <div class="user-panel d-flex align-items-center mb-4">
    <div class="image">
      <img src="{{ Auth::user()->profile_photo
                   ? asset('storage/' . Auth::user()->profile_photo)
                   : asset('adminlte/dist/img/user2-160x160.jpg') }}"
           class="img-circle elevation-2" alt="User Image" style="width:40px;height:40px;">
    </div>
    <div class="info ml-2">
      <a href="{{ url('user/profile') }}" class="d-block" style="color:#fff;font-weight:600;">
        {{ Auth::user()->nama ?? 'User Name' }}
      </a>
    </div>
  </div>

  <!-- Menu -->
  <nav class="nav flex-column">
    <li class="nav-item">
      <a href="{{ url('/') }}" class="nav-link {{ $activeMenu=='dashboard'?'active':'' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Overview</p>
      </a>
    </li>

    <div class="nav-header">Data Pengguna</div>
    <li class="nav-item">
      <a href="{{ url('/level') }}" class="nav-link {{ $activeMenu=='level'?'active':'' }}">
        <i class="nav-icon fas fa-layer-group"></i>
        <p>Level User</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('/user') }}" class="nav-link {{ $activeMenu=='user'?'active':'' }}">
        <i class="nav-icon far fa-user"></i>
        <p>Data User</p>
      </a>
    </li>

    <div class="nav-header">Data Barang</div>
    <li class="nav-item">
      <a href="{{ url('/kategori') }}" class="nav-link {{ $activeMenu=='kategori'?'active':'' }}">
        <i class="nav-icon far fa-bookmark"></i>
        <p>Kategori Barang</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu=='barang'?'active':'' }}">
        <i class="nav-icon far fa-list-alt"></i>
        <p>Data Barang</p>
      </a>
    </li>

    <div class="nav-header">Data Transaksi</div>
    <li class="nav-item">
      <a href="{{ url('/stok') }}" class="nav-link {{ $activeMenu=='stok'?'active':'' }}">
        <i class="nav-icon fas fa-cubes"></i>
        <p>Stok Barang</p>
        <span class="badge">{{ $stokCount ?? '' }}</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('/penjualan') }}" class="nav-link {{ $activeMenu=='penjualan'?'active':'' }}">
        <i class="nav-icon fas fa-cash-register"></i>
        <p>Transaksi Penjualan</p>
        <span class="badge badge-new">{{ $newSalesCount ?? 'New' }}</span>
      </a>
    </li>

    <!-- Logout di bawah -->
    <div class="logout">
      <li class="nav-item">
        <a href="#"
           class="nav-link"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
          @csrf
        </form>
      </li>
    </div>
  </nav>
</div>
