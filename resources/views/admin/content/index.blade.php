@extends('layouts.admin')

@section('title', 'Gestion du contenu')
@section('page-title', 'Gestion du contenu')

@section('content')
<div class="container">
  <h5 class="mb-4">Pages disponibles pour la modification :</h5>

  <ul class="list-group">
    <li class="list-group-item">
      <a href="{{ url('/admin/content/main') }}">Accueil</a>
    </li>
    <li class="list-group-item text-muted">
      Cours — bientôt disponible
    </li>
    <li class="list-group-item text-muted">
      Services — bientôt disponible
    </li>
    <li class="list-group-item text-muted">
      Ressources — bientôt disponible
    </li>
    <li class="list-group-item text-muted">
      À propos — bientôt disponible
    </li>
    <li class="list-group-item text-muted">
      Barre de navigation — bientôt disponible
    </li>
    <li class="list-group-item text-muted">
      Pied de page — bientôt disponible
    </li>
  </ul>
</div>
@endsection
