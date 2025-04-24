{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Lottery Display</title>

  <!-- Font & Icons -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
        rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  
  <!-- AdminLTE core (untuk utilitas) -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <style>
    /* full-screen split layout */
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .container-split {
      display: flex;
      height: 100%;
    }

    /* kiri: info/ilustrasi */
    .panel-left {
      flex: 1;
      background: url("{{ asset('view1.jpg') }}") center/cover no-repeat;
      color: #ffffff;
      display: flex;
      flex-direction: column;
      justify-content: left;
      align-items: left;
      padding: 2rem;
      text-align: left;
    }
    
    .panel-left .logo {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }
    .panel-left h1 {
      font-size: 1.25rem;
      margin-bottom: 1rem;
      line-height: 1.2;
      color: rgba(255, 255, 255, 0.6); /* 60% opacity */
    }
    .panel-left p {
      font-size: 1rem;
      max-width: 300px;
      line-height: 1.5;
    }

    /* kanan: form */
    .panel-right {
      flex: 1;
      background: #f4f6f9;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }
    .form-wrapper {
      width: 100%;
      max-width: 400px;
      background: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 2rem;
    }
    .form-wrapper h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-weight: 600;
      color: #333;
    }
    .form-group {
      margin-bottom: 1rem;
    }
    .form-group label {
      display: block;
      margin-bottom: 0.25rem;
      color: #555;
      font-size: 0.9rem;
    }
    .form-group input,
    .form-group select {
      width: 100%;
      padding: 0.5rem 0.75rem;
      border: 1px solid #ced4da;
      border-radius: 4px;
      font-size: 1rem;
    }
    .form-group input:focus,
    .form-group select:focus {
      outline: none;
      border-color: #80bdff;
      box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
    }
    .terms {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
    }
    .terms input {
      margin-right: 0.5rem;
    }
    .btn-submit {
      width: 100%;
      padding: 0.75rem;
      background: #0062E6;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
    }
    .btn-submit:hover {
      background: #0052c2;
    }
    .footer-link {
      text-align: center;
      margin-top: 1rem;
      font-size: 0.9rem;
    }
    .footer-link a {
      color: #0062E6;
    }
  </style>
</head>
<body>
  <div class="container-split">
    <!-- Panel kiri: ilustrasi & teks -->
    <div class="panel-left">
      <div class="logo">Lottery Display</div>
      <h1>Manage all your lottery efficiently. Let’s get you all set up so you can verify your personal account and begin setting up your profile.</h2>
    </div>

    <!-- Panel kanan: form -->
    <div class="panel-right">
      <div class="form-wrapper">
        <h2>Register</h2>

        <form action="{{ route('register') }}" method="POST" id="registerForm">
          @csrf
          
          <div class="form-group">
            <label for="username">Username</label>
            <input id="username" type="text" name="username" minlength="3" required>
          </div>

          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input id="nama" type="text" name="nama" maxlength="100" required>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" minlength="6" required>
          </div>

          <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" minlength="6" required>
          </div>

          <div class="terms">
            <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
            <label for="agreeTerms">Saya menyetujui <a href="#">syarat & ketentuan</a></label>
          </div>

          <button type="submit" class="btn-submit">Daftar</button>

          <div class="footer-link">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- JS dependencies (tetap utuh) -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // validasi & AJAX seperti sebelumnya
    $('#registerForm').validate({
      rules: {
        level_id: { required: true },
        username: { required: true, minlength: 3 },
        nama: { required: true, maxlength: 100 },
        password: { required: true, minlength: 6 },
        password_confirmation: { required: true, minlength: 6, equalTo: "#password" },
        terms: { required: true }
      },
      messages: {
        level_id: "Pilih level akun Anda",
        username: {
          required: "Masukkan username",
          minlength: "Username minimal 3 karakter"
        },
        nama: {
          required: "Masukkan nama lengkap",
          maxlength: "Nama tidak boleh lebih dari 100 karakter"
        },
        password: {
          required: "Masukkan password",
          minlength: "Password minimal 6 karakter"
        },
        password_confirmation: {
          required: "Konfirmasi password wajib diisi",
          equalTo: "Password dan konfirmasi harus sama"
        },
        terms: "Anda harus menyetujui syarat & ketentuan"
      },
      errorPlacement: function(error, element) {
        error.addClass('text-danger');
        error.insertAfter(element);
      },
      highlight: function(element) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element) {
        $(element).removeClass('is-invalid');
      },
      submitHandler: function(form) {
        $.ajax({
          url: form.action,
          type: form.method,
          data: $(form).serialize(),
          success(response) {
            if (response.status) {
              Swal.fire({
                icon: 'success',
                title: 'Registrasi Berhasil',
                text: response.message
              }).then(() => {
                window.location = response.redirect;
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Registrasi Gagal',
                text: response.message || 'Periksa kembali data Anda.'
              });
            }
          },
          error() {
            Swal.fire({
              icon: 'error',
              title: 'Kesalahan Sistem',
              text: 'Silakan coba lagi nanti.'
            });
          }
        });
        return false;
      }
    });
  </script>
</body>
</html>
