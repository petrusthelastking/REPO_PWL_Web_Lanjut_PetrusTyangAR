<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Pengguna</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome & AdminLTE -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <!-- Custom CSS -->
  <style>
    body.login-page {
      /* gradient animasi */
      background: url("{{ asset('view1.jpg') }}") center/cover no-repeat;
      background-size: 600% 600%;
      animation: gradientShift 20s ease infinite;
    }

    .login-box {
      width: 900px;
      max-width: 100%;
      margin: 5% auto;
      display: flex;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;

    }
    .login-image {
      flex: 1;
      background: url("{{ asset('view1.jpg') }}") center/cover no-repeat;
    }
    .login-form {
      flex: 1;
      background: #fff;
      padding: 40px;
      box shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .login-form .card-header {
      border-bottom: none;
      text-align: center;
      padding-bottom: 0;
    }
    .login-form .login-box-msg {
      margin-bottom: 30px;
      font-size: 1.1rem;
      color: #666;
    }
    .login-form .form-control {
      border-radius: 4px;
      box-shadow: none;
      border-color: #ced4da;
    }
    .login-form .btn-primary {
      border-radius: 4px;
      padding: 10px;
      font-weight: 600;
    }
    .login-form .icheck-primary input:checked + label::before {
      background: #007bff;
      border-color: #007bff;
    }
  </style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <!-- kiri: gambar / ilustrasi -->
    <div class="login-image"></div>

    <!-- kanan: form -->
    <div class="login-form card card-outline card-primary">
      <div class="card-header">
        <a href="{{ url('/') }}" class="h1"><b>Admin</b>POS</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Silakan masuk untuk memulai sesi Anda.</p>
        <form action="{{ url('login') }}" method="POST" id="form-login">
          @csrf
          <div class="input-group mb-3">
            <input type="text" id="username" name="username" class="form-control"
                   placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-user"></span></div>
            </div>
            <small id="error-username" class="error-text text-danger"></small>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="password" name="password" class="form-control"
                   placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
            <small id="error-password" class="error-text text-danger"></small>
          </div>
          <div class="row mb-4">
            <div class="col-7">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">Ingat Saya</label>
              </div>
            </div>
            <div class="col-5">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
          </div>
        </form>
        <p class="mb-0 text-center">
          Belum punya akun?
          <a href="{{ route('register') }}">Daftar di sini</a>
        </p>
      </div>
    </div>
  </div>

  <!-- JS tetap sama seperti sebelum -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
  <script>
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    // ... kode validasi & AJAX seperti sebelumnya
  </script>
</body>
</html>
