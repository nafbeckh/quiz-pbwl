<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <title>Home - {{ config('app.name') }}</title>
  <style>
    body {
      background-color: #e8e8e8;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Golongan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pelanggan</a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ auth()->user()->nama }}</a>
            <div class="dropdown-menu">
              <a href="javascript:void(0);" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    <div class="container">
      <div class="card">
        <div class="card-body">
          @yield('content')
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-light text-center py-2 fixed-bottom">
    <div class="container">
      <p>&copy; 2023 {{ config('app.name') }}. All rights reserved.</p>
    </div>
  </footer>

  <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">
    @csrf
  </form>

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>