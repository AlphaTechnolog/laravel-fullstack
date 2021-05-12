<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', env("APP_NAME"))</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <x-env></x-env>

  <div id="app">
    <Navbar :logged="!!env.user"></Navbar>
    <Brs :n="3"></Brs>
    <div class="container">
      @yield('content')
    </div>
  </div>

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
