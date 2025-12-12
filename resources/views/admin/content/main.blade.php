@extends('layouts.admin-editable')

@section('title', 'Главная')

@section('content')

<section class="hero">
  <div class="hero-content">
    <div class="teacher-image">
      <img src="{{ asset('images/BezFonaKop.png') }}" alt="Teacher Albina">
    </div>
    <div class="hero-text">
      <h1>
        <span class="inline-editable" data-translate="hero.title">
          {{ tf('homepage', 'hero.title') }}
        </span>
        <button class="inline-edit-btn" onclick="openEditor('hero.title')">
          <i class="fas fa-pen"></i>
        </button>
      </h1>
      <p>
        <span class="inline-editable" data-translate="hero.description">
          {{ tf('homepage', 'hero.description') }}
        </span>
        <button class="inline-edit-btn" onclick="openEditor('hero.description')">
          <i class="fas fa-pen"></i>
        </button>
      </p>
      <a href="#" class="btn">
        <span class="inline-editable" data-translate="hero.button">
          {{ tf('homepage', 'hero.button') }}
        </span>
        <button class="inline-edit-btn" onclick="openEditor('hero.button')">
          <i class="fas fa-pen"></i>
        </button>
      </a>
    </div>
  </div>
</section>


<!-- MOTIVATION SECTION -->
<section class="motivation">
  <div class="container">
    <h6>
      <span class="inline-editable" data-translate="motivation.title">
     {{ tf('homepage', 'motivation.title') }}</span>
      
      <button class="inline-edit-btn" onclick="openEditor('motivation.title')">
        <i class="fas fa-pen"></i>
      </button>
    </h6>

    <div class="reasons-grid">
      <div class="reason-card" data-aos="fade-up">
        <div class="reason-icon">
          <i class="fas fa-briefcase"></i>
        </div>
        <h3>
          <span class="inline-editable" data-translate="motivation.card1.title"></span>
           {{ tf('homepage', 'motivation.card1.title') }}
          <button class="inline-edit-btn" onclick="openEditor('motivation.card1.title')">
            <i class="fas fa-pen"></i>
          </button>
        </h3>
        <p>
          <span class="inline-editable" data-translate="motivation.card1.text">{{ tf('homepage', 'motivation.card1.text') }} </span>
           
          <button class="inline-edit-btn" onclick="openEditor('motivation.card1.text')">
            <i class="fas fa-pen"></i>
          </button>
        </p>
      </div>

      <div class="reason-card" data-aos="fade-up" data-aos-delay="100">
        <div class="reason-icon">
          <i class="fas fa-globe-europe"></i>
        </div>
        <h3>
          <span class="inline-editable" data-translate="motivation.card2.title"> {{ tf('homepage', 'motivation.card2.title') }}</span>
           
          <button class="inline-edit-btn" onclick="openEditor('motivation.card2.title')">
            <i class="fas fa-pen"></i>
          </button>
        </h3>
        <p>
          <span class="inline-editable" data-translate="motivation.card2.text">{{ tf('homepage', 'motivation.card2.text') }}</span>
           
          <button class="inline-edit-btn" onclick="openEditor('motivation.card2.text')">
            <i class="fas fa-pen"></i>
          </button>
        </p>
      </div>

      <div class="reason-card" data-aos="fade-up" data-aos-delay="200">
        <div class="reason-icon">
          <i class="fas fa-brain"></i>
        </div>
        <h3>
          <span class="inline-editable" data-translate="motivation.card3.title"> {{ tf('homepage', 'motivation.card3.title') }}</span>
         
          <button class="inline-edit-btn" onclick="openEditor('motivation.card3.title')">
            <i class="fas fa-pen"></i>
          </button>
        </h3>
        <p>
          <span class="inline-editable" data-translate="motivation.card3.text"> {{ tf('homepage', 'motivation.card3.text') }}</span>
         
          <button class="inline-edit-btn" onclick="openEditor('motivation.card3.text')">
            <i class="fas fa-pen"></i>
          </button>
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ======================== LANGUAGE TEST SECTION (with Parallax) ======================== -->
<section class="language-test-section parallax" id="test">
  <div class="overlay"></div>
  <div class="content" data-aos="fade-up">
    <div class="test-icon-animated">
      <i class="fas fa-clipboard-check"></i>
    </div>

    <h6>
      <span class="inline-editable" data-translate="test.title">{{ tf('homepage', 'test.title') }}</span>
      <button class="inline-edit-btn" onclick="openEditor('test.title')">
        <i class="fas fa-pen"></i>
      </button>
    </h6>

    <p>
      <span class="inline-editable" data-translate="test.description">
        {{ tf('homepage', 'test.description') }}
      </span>
      <button class="inline-edit-btn" onclick="openEditor('test.description')">
        <i class="fas fa-pen"></i>
      </button>
    </p>

    <a href="#" class="btn btn-test">
      <span class="inline-editable" data-translate="test.button">{{ tf('homepage', 'test.button') }}</span>
      <button class="inline-edit-btn" onclick="openEditor('test.button')">
        <i class="fas fa-pen"></i>
      </button>
    </a>
  </div>
</section>
<!-- =============================================== -->

<!-- ======================== WHY LEARN WITH ALBINA (3 Cards with Flip Effect) ======================== -->
<section class="about-teacher" id="about-teacher">
  <div class="container">
    <h6>
      <span class="inline-editable" data-translate="about.title">Pourquoi apprendre avec Albina ?</span>
      <button class="inline-edit-btn" onclick="openEditor('about.title')">
        <i class="fas fa-pen"></i>
      </button>
    </h6>

    <div class="flip-cards-grid">

      <!-- Card 1: Native Speaker -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <div class="flip-icon">
              <i class="fas fa-globe-europe"></i>
            </div>
            <h3>
              <span class="inline-editable" data-translate="about.card1.title">20 ans en France</span>
              <button class="inline-edit-btn" onclick="openEditor('about.card1.title')">
                <i class="fas fa-pen"></i>
              </button>
            </h3>
          </div>
          <div class="flip-card-back">
            <p>
              <span class="inline-editable" data-translate="about.card1.text">
                Vit et travaille en France depuis plus de deux décennies. Connaissance approfondie de la langue et de la culture française moderne.
              </span>
              <button class="inline-edit-btn" onclick="openEditor('about.card1.text')">
                <i class="fas fa-pen"></i>
              </button>
            </p>
          </div>
        </div>
      </div>

      <!-- Card 2: Teaching Experience -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <div class="flip-icon">
              <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <h3>
              <span class="inline-editable" data-translate="about.card2.title">10 ans d'expérience</span>
              <button class="inline-edit-btn" onclick="openEditor('about.card2.title')">
                <i class="fas fa-pen"></i>
              </button>
            </h3>
          </div>
          <div class="flip-card-back">
            <p>
              <span class="inline-editable" data-translate="about.card2.text">
                Plus de 10 ans d'enseignement du français aux adultes et aux enfants. Méthodes éprouvées et résultats garantis.
              </span>
              <button class="inline-edit-btn" onclick="openEditor('about.card2.text')">
                <i class="fas fa-pen"></i>
              </button>
            </p>
          </div>
        </div>
      </div>

      <!-- Card 3: Individual Approach -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <div class="flip-icon">
              <i class="fas fa-user-friends"></i>
            </div>
            <h3>
              <span class="inline-editable" data-translate="about.card3.title">Approche personnalisée</span>
              <button class="inline-edit-btn" onclick="openEditor('about.card3.title')">
                <i class="fas fa-pen"></i>
              </button>
            </h3>
          </div>
          <div class="flip-card-back">
            <p>
              <span class="inline-editable" data-translate="about.card3.text">
                Programme adapté à vos objectifs et votre niveau. Soutien constant et atmosphère bienveillante pour chaque élève.
              </span>
              <button class="inline-edit-btn" onclick="openEditor('about.card3.text')">
                <i class="fas fa-pen"></i>
              </button>
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- TESTIMONIALS SECTION -->
<section class="testimonials">
  <div class="container">
    <!-- Заголовок с декоративными линиями -->
    <div class="testimonials-header">
      <div class="header-line"></div>
      <h6>
        <span class="inline-editable" data-translate="testimonials.title">{{ tf('homepage', 'testimonials.title') }}</span>
        <button class="inline-edit-btn" onclick="openEditor('testimonials.title')"><i class="fas fa-pen"></i></button>
      </h6>
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
                  <p class="testimonial-text">
                    <span class="inline-editable" data-translate="testimonial.1.text">
                     {{ tf('homepage', 'testimonial.1.text') }}
                    </span>
                    <button class="inline-edit-btn" onclick="openEditor('testimonial.1.text')"><i class="fas fa-pen"></i></button>
                  </p>
                  <span class="quote-right">"</span>
                </div>
                <div class="testimonial-author">
                  <strong>
                    <span class="inline-editable" data-translate="testimonial.1.name">{{ tf('homepage', 'testimonial.1.name') }}</span>
                    <button class="inline-edit-btn" onclick="openEditor('testimonial.1.name')"><i class="fas fa-pen"></i></button>
                  </strong>
                </div>
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
                  <p class="testimonial-text">
                    <span class="inline-editable" data-translate="testimonial.2.text">
                       {{ tf('homepage', 'testimonial.2.text') }}
                    </span>
                    <button class="inline-edit-btn" onclick="openEditor('testimonials.quote2')"><i class="fas fa-pen"></i></button>
                  </p>
                  <span class="quote-right">"</span>
                </div>
                <div class="testimonial-author">
                  <strong>
                    <span class="inline-editable" data-translate="testimonial.2.name">{{ tf('homepage', 'testimonial.2.name') }}</span>
                    <button class="inline-edit-btn" onclick="openEditor('testimonial.2.name')"><i class="fas fa-pen"></i></button>
                  </strong>
                </div>
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
                  <p class="testimonial-text">
                    <span class="inline-editable" data-translate="testimonial.3.text">
                    {{ tf('homepage', 'testimonial.3.text') }}
                    </span>
                    <button class="inline-edit-btn" onclick="openEditor('testimonial.3.text')"><i class="fas fa-pen"></i></button>
                  </p>
                  <span class="quote-right">"</span>
                </div>
                <div class="testimonial-author">
                  <strong>
                    <span class="inline-editable" data-translate="testimonial.3.name">{{ tf('homepage', 'testimonial.3.name') }}</span>
                    <button class="inline-edit-btn" onclick="openEditor('testimonial.3.name')"><i class="fas fa-pen"></i></button>
                  </strong>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Контейнер точек-переключателей -->
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
