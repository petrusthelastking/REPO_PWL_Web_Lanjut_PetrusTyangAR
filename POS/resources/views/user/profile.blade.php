@extends('layouts.template')

@push('css')
<style>
  .profile-container {
    display: flex;
    flex-wrap: wrap;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    overflow: hidden;
  }
  .profile-form {
    flex: 1 1 400px;
    padding: 2.5rem;
  }
  .profile-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
  }
  .profile-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0;
  }
  .btn-edit {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    background: #ffc107;
    color: #212529;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  .btn-edit:hover {
    background: #e0a800;
  }
  .profile-field {
    margin-bottom: 1.5rem;
  }
  .profile-field label {
    display: block;
    font-size: 0.75rem;
    color: #888;
    text-transform: uppercase;
    margin-bottom: 0.25rem;
  }
  .profile-field .value {
    font-size: 1rem;
    border: none;
    border-bottom: 1px solid #ccc;
    padding: 0.25rem 0;
    width: 100%;
    color: #333;
  }
  .profile-avatar {
    position: relative;
    flex: 0 0 250px;
    background: #f9f9f9;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem;
  }
  .profile-avatar img {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }
  .profile-avatar .btn-camera {
    position: absolute;
    bottom: 2rem;
    right: calc(25% - 70px);
    background: #fff;
    border-radius: 50%;
    padding: 0.5rem;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
  }
  .profile-avatar .btn-camera i {
    font-size: 1.1rem;
    color: #555;
  }
  .profile-save {
    padding: 2rem;
    flex: 1 1 100%;
    text-align: right;
  }
  .btn-save {
    background: linear-gradient(45deg, #ff6a00, #ee0979);
    color: #fff;
    padding: 0.75rem 2rem;
    border: none;
    border-radius: 24px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  }
  .btn-save:hover {
    opacity: 0.9;
  }
</style>
@endpush

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="profile-container">
      <!-- Panel Kiri: Username & Nama + Edit Button -->
      <div class="profile-form">
        <div class="profile-header">
          <h1>Profile</h1>
          <button class="btn-edit" id="btnEditProfile">Edit Profile</button>
        </div>
        <div class="profile-field">
          <label>Username</label>
          <div class="value">{{ $user->username }}</div>
        </div>
        <div class="profile-field">
          <label>Nama</label>
          <div class="value">{{ $user->nama }}</div>
        </div>
      </div>

      <!-- Panel Kanan: Avatar & Kamera -->
      <div class="profile-avatar">
        <img src="{{ $user->profile_photo
                      ? asset('storage/' . $user->profile_photo)
                      : asset('adminlte/dist/img/user2-160x160.jpg') }}"
             alt="Foto Profil">
      </div>
    </div>
  </div>
</section>

<!-- Modal untuk Update Profile -->
<div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-hidden="true"></div>
@endsection

@push('js')
<script>
  function modalAction(url = '') {
    $('#updateProfileModal').load(url, function () {
      $('#updateProfileModal').modal('show');
    });
  }
  $('#btnEditProfile').on('click', function(e){
    e.preventDefault();
    modalAction("{{ url('user/profile_ajax') }}");
  });
</script>
@endpush
