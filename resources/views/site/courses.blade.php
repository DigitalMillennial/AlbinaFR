@extends('layouts.site')

@section('title', 'Cours de français')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/cours.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
<section class="courses-section parallax">
  <div class="overlay"></div>
  <div class="container">
    <h1 class="section-title">Cours de français</h1>
    <p class="section-subtitle">
      Choisissez le format d’apprentissage qui vous convient le mieux
    </p>

    <div class="courses-grid">
      @forelse ($courses as $course)
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <div class="course-icon">
                <i class="{{ $course->icon_class ?? 'fas fa-book' }}"></i>
              </div>
              <h3>{{ $course->title }}</h3>
              <p>{{ $course->description }}</p>
            </div>
            <div class="flip-card-back">
              <p>
                📘 Niveau: {{ $course->niveau ?? 'Tous niveaux' }}<br>
                👥 Groupe: {{ $course->type === 'individual' ? 'Individuel' : '5–8 personnes' }}<br>
                ⏱ {{ $course->nb_lessons ?? '?' }}h /
                {{ $course->duration_weeks ?? '?' }} semaines<br>
                💶 {{ $course->price ?? '?' }}€<br>
                📆 
@foreach($course->groups as $group)
    {{ $group->group_name }} :
    @foreach($group->schedules ?? [] as $schedule)
        {{ $schedule->day_short }} {{ $schedule->start_hm }}-{{ $schedule->end_hm }}@if(!$loop->last), @endif
    @endforeach
    <br>
@endforeach




              </p>
              <button class="btn btn-primary" onclick="openCourseModal('{{ $course->id }}', '{{ $course->title }}')">
                Prendre ce cours
              </button>
              <script type="application/json" id="groups-{{ $course->id }}">
  @json($course->groups)
</script>
            </div>
          </div>
        </div>
      @empty
        <p class="text-center text-muted">Aucun cours disponible pour le moment.</p>
      @endforelse
    </div>
  </div>
</section>

<div id="modalContainer"></div>
@endsection

@push('scripts')
  <script src="{{ asset('js/cours.js') }}"></script>
@endpush
