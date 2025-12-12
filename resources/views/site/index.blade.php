@extends('layouts.site')

@section('title', \App\Models\Translation::where('group', 'homepage')->where('key', 'hero.title')->where('locale', app()->getLocale())->value('value'))

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

<!-- HERO -->
<section class="hero">
  <div class="hero-content">
    <div class="teacher-image">
      <img src="{{ asset('images/BezFonaKop.png') }}" alt="Teacher Albina">
    </div>
    <div class="hero-text">
      <h1>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'hero.title')->where('locale', app()->getLocale())->value('value') }}</h1>
      <p>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'hero.description')->where('locale', app()->getLocale())->value('value') }}</p>
      <a href="#" class="btn">{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'hero.button')->where('locale', app()->getLocale())->value('value') }}</a>
    </div>
  </div>
</section>


<!-- MOTIVATION SECTION -->
<section class="motivation">
  <div class="container">
    <h6>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'motivation.title')->where('locale', app()->getLocale())->value('value') }}</h6>
    <div class="reasons-grid">
      <div class="reason-card" data-aos="fade-up">
        <div class="reason-icon"><i class="fas fa-briefcase"></i></div>
        <h3>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'motivation.card1.title')->where('locale', app()->getLocale())->value('value') }}</h3>
        <p>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'motivation.card1.text')->where('locale', app()->getLocale())->value('value') }}</p>
      </div>
      <div class="reason-card" data-aos="fade-up" data-aos-delay="100">
        <div class="reason-icon"><i class="fas fa-globe-europe"></i></div>
        <h3>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'motivation.card2.title')->where('locale', app()->getLocale())->value('value') }}</h3>
        <p>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'motivation.card2.text')->where('locale', app()->getLocale())->value('value') }}</p>
      </div>
      <div class="reason-card" data-aos="fade-up" data-aos-delay="200">
        <div class="reason-icon"><i class="fas fa-brain"></i></div>
        <h3>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'motivation.card3.title')->where('locale', app()->getLocale())->value('value') }}</h3>
        <p>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'motivation.card3.text')->where('locale', app()->getLocale())->value('value') }}</p>
      </div>
    </div>
  </div>
</section>

<!-- LANGUAGE TEST SECTION -->
<section class="language-test-section parallax" id="test">
  <div class="overlay"></div>
  <div class="content" data-aos="fade-up">
    <div class="test-icon-animated"><i class="fas fa-clipboard-check"></i></div>
    <h6>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'test.title')->where('locale', app()->getLocale())->value('value') }}</h6>
    <p>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'test.description')->where('locale', app()->getLocale())->value('value') }}</p>
    <a href="#" class="btn btn-test">{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'test.button')->where('locale', app()->getLocale())->value('value') }}</a>
  </div>
</section>

<!-- ABOUT TEACHER -->
<section class="about-teacher" id="about-teacher">
  <div class="container">
    <h6>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'about.title')->where('locale', app()->getLocale())->value('value') }}</h6>
    <div class="flip-cards-grid">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <div class="flip-icon"><i class="fas fa-globe-europe"></i></div>
            <h3>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'about.card1.title')->where('locale', app()->getLocale())->value('value') }}</h3>
          </div>
          <div class="flip-card-back">
            <p>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'about.card1.text')->where('locale', app()->getLocale())->value('value') }}</p>
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <div class="flip-icon"><i class="fas fa-chalkboard-teacher"></i></div>
            <h3>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'about.card2.title')->where('locale', app()->getLocale())->value('value') }}</h3>
          </div>
          <div class="flip-card-back">
            <p>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'about.card2.text')->where('locale', app()->getLocale())->value('value') }}</p>
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <div class="flip-icon"><i class="fas fa-user-friends"></i></div>
            <h3>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'about.card3.title')->where('locale', app()->getLocale())->value('value') }}</h3>
          </div>
          <div class="flip-card-back">
            <p>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'about.card3.text')->where('locale', app()->getLocale())->value('value') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials">
  <div class="container">
    <div class="testimonials-header">
      <div class="header-line"></div>
      <h6>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'testimonials.title')->where('locale', app()->getLocale())->value('value') }}</h6>
      <div class="header-line"></div>
    </div>
    <div class="testimonial-slider">
      <div class="testimonial-track" id="testimonialTrack">
        <!-- Slide 1 -->
        <div class="testimonial-slide active">
          <div class="card-layers">
            <div class="layer layer-3"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-1">
              <div class="testimonial-card">
                <div class="author-photo">
                  <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop" alt="Lillian Nelson">
                </div>
                <div class="quote-wrapper">
                  <span class="quote-left">"</span>
                  <p class="testimonial-text">{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'testimonial.1.text')->where('locale', app()->getLocale())->value('value') }}</p>
                  <span class="quote-right">"</span>
                </div>
                <div class="testimonial-author"><strong>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'testimonial.1.name')->where('locale', app()->getLocale())->value('value') }}</strong></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="testimonial-slide">
          <div class="card-layers">
            <div class="layer layer-3"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-1">
              <div class="testimonial-card">
                <div class="author-photo">
                  <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=200&h=200&fit=crop" alt="Marc Dubois">
                </div>
                <div class="quote-wrapper">
                  <span class="quote-left">"</span>
                  <p class="testimonial-text">{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'testimonial.2.text')->where('locale', app()->getLocale())->value('value') }}</p>
                  <span class="quote-right">"</span>
                </div>
                <div class="testimonial-author"><strong>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'testimonial.2.name')->where('locale', app()->getLocale())->value('value') }}</strong></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Slide 3 -->
        <div class="testimonial-slide">
          <div class="card-layers">
            <div class="layer layer-3"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-1">
              <div class="testimonial-card">
                <div class="author-photo">
                  <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200&h=200&fit=crop" alt="Sophie Martin">
                </div>
                <div class="quote-wrapper">
                  <span class="quote-left">"</span>
                  <p class="testimonial-text">{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'testimonial.3.text')->where('locale', app()->getLocale())->value('value') }}</p>
                  <span class="quote-right">"</span>
                </div>
                <div class="testimonial-author"><strong>{{ \App\Models\Translation::where('group', 'homepage')->where('key', 'testimonial.3.name')->where('locale', app()->getLocale())->value('value') }}</strong></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="testimonial-controls">
        <div class="testimonial-dots">
          <span class="dot active"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
  <script src="{{ asset('js/script.js') }}"></script>
@endpush
