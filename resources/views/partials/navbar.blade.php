@php
  $locale = app()->getLocale();
  $navItems = [
    ['route' => route('home'), 'key' => 'home'],
    ['route' => route('site.courses'), 'key' => 'courses'],
    ['route' => '#', 'key' => 'services'],
    ['route' => '#', 'key' => 'resources'],
    ['route' => '#', 'key' => 'about'],
  ];
@endphp

<nav class="navbar">
  <!-- Hamburger Menu -->
  <button class="hamburger" onclick="toggleMenu()" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>

  <!-- Logo -->
  <a href="{{ route('home') }}" class="logo" aria-label="Français avec Albina — Accueil">
    <i class="fas fa-graduation-cap"></i>
    <span>Français avec Albina</span>
  </a>

  <!-- Navigation Links -->
  <ul class="nav-links" id="navLinks">
    @foreach ($navItems as $item)
      <li>
        <a href="{{ $item['route'] }}"
           class="{{ url()->current() === $item['route'] ? 'active' : '' }}">
          {{ \App\Models\Translation::where('group', 'navbar')->where('key', $item['key'])->where('locale', $locale)->value('value') ?? ucfirst($item['key']) }}
        </a>
      </li>
    @endforeach
  </ul>

  <!-- Language Selector -->
 <div class="language-selector">
  <button onclick="window.location.href='{{ route('lang.switch', 'fr') }}'">FR</button>
  <button onclick="window.location.href='{{ route('lang.switch', 'ru') }}'">RU</button>
  <button onclick="window.location.href='{{ route('lang.switch', 'en') }}'">EN</button>
</div>

</nav>
