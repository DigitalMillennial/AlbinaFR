@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Ajouter une ressource</h1>

    {{-- Сообщения об ошибках --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erreur)
                    <li>{{ $erreur }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Форма --}}
    <form action="{{ route('admin.ressources.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Файл --}}
        <div class="mb-3">
            <label for="file" class="form-label">Fichier</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>

        {{-- Активность --}}
        <div class="form-check mb-3">
            <input type="checkbox" name="is_active" id="is_active" class="form-check-input">
            <label for="is_active" class="form-check-label">Actif</label>
        </div>

        {{-- Заголовки --}}
        <h4>Titres</h4>
        <div class="mb-3">
            <label for="title_fr" class="form-label">Titre (FR)</label>
            <input type="text" name="title_fr" id="title_fr" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="title_en" class="form-label">Title (EN)</label>
            <input type="text" name="title_en" id="title_en" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="title_ru" class="form-label">Заголовок (RU)</label>
            <input type="text" name="title_ru" id="title_ru" class="form-control" required>
        </div>

        {{-- Описания --}}
        <h4>Descriptions</h4>
        <div class="mb-3">
            <label for="description_fr" class="form-label">Description (FR)</label>
            <textarea name="description_fr" id="description_fr" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="description_en" class="form-label">Description (EN)</label>
            <textarea name="description_en" id="description_en" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="description_ru" class="form-label">Описание (RU)</label>
            <textarea name="description_ru" id="description_ru" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
