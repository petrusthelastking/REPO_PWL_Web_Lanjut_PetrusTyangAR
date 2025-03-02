<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - POS App</title>
  <!-- Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- animate.css untuk animasi tambahan -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-gray-50">
  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-blue-500 to-indigo-600 shadow-lg sticky top-0 z-50 animate__animated animate__fadeInDown">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between h-16">
        <div class="flex">
          <div class="flex-shrink-0 flex items-center">
            <a href="/" class="text-white text-2xl font-bold">POS App</a>
          </div>
          <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
            <a href="/" class="text-white inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-white transition-all duration-300">Home</a>
            <a href="/sales" class="text-white inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-white transition-all duration-300">Sales</a>
            <a href="/category/food-beverage" class="text-white inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-white transition-all duration-300">Products</a>
            <a href="/user/2341720227/name/Petrus Tyang A>R" class="text-white inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-white transition-all duration-300">User</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Konten halaman -->
  <div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      @yield('content')
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 py-4 mt-8">
    <div class="max-w-7xl mx-auto text-center text-gray-400">
      &copy; {{ date('Y') }} POS App. All rights reserved.
    </div>
  </footer>
</body>
</html>
