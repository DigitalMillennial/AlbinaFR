<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Français avec Albina')</title>

  <!-- Стили как на главной -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  
 

  @stack('styles')
</head>
<body>

  <!-- Кнопка возврата -->
  <div class="text-end p-3">
    <a href="{{ route('admin.content.index') }}" class="btn btn-outline-secondary btn-sm">
      Retour à l’administration
    </a>
  </div>

  <!-- Контент страницы -->
  <main>
    @yield('content')
  </main>

  <!-- Модалка редактирования -->
  @include('partials.edit-modal')

  <!-- Скрипты как на главной -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="{{ asset('js/admin.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>

  @stack('scripts')
</body>
</html>
