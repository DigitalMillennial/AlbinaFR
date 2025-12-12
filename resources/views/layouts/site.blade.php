<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Français avec Albina')</title>

  <!-- STYLES -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

  @stack('styles')
</head>
<body>

  <!-- NAVBAR -->
  @include('partials.navbar')

  <!-- PAGE CONTENT -->
  <main>
    @yield('content')
  </main>

  <!-- FOOTER -->
  @include('partials.footer')

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/cours.js') }}"></script>
<script src="{{ asset('js/cours.js') }}"></script>
  @stack('scripts')
</body>
</html>
