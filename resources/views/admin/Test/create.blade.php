@extends('layouts.admin')

@section('title', 'Добавить вопрос')


@section('content')
<div class="container">
    <h1>Добавить вопрос</h1>

    <form action="{{ route('admin.questions.store') }}" method="POST">
        @csrf

        {{-- Вопросы на трёх языках --}}
        <div class="mb-3">
            <label for="text_ru" class="form-label">Текст (Русский)</label>
            <textarea name="text_ru" id="text_ru" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="text_fr" class="form-label">Texte (Français)</label>
            <textarea name="text_fr" id="text_fr" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="text_en" class="form-label">Text (English)</label>
            <textarea name="text_en" id="text_en" class="form-control" required></textarea>
        </div>

        {{-- Сложность --}}
        <div class="mb-3">
            <label for="difficulty" class="form-label">Сложность</label>
            <select name="difficulty" id="difficulty" class="form-select" required>
                <option value="1">A1</option>
                <option value="2">A2</option>
                <option value="3">B1</option>
                <option value="4">B2</option>
                <option value="5">C1</option>
            </select>
        </div>

        <hr>

        {{-- Ответы --}}
        <h3>Ответы</h3>
        <div id="answers-wrapper">
            {{-- Ответ 1 --}}
            <div class="row mb-2 align-items-center answer-item">
                <div class="col-6">
                    <label>Ответ 1:</label>
                    <input type="text" name="answers[0][text]" class="form-control" required>
                </div>
                <div class="col-2">
                    <label>Правильный?</label><br>
                    <input type="radio" name="answers[0][is_correct]" value="1"> Да
                    <input type="radio" name="answers[0][is_correct]" value="0" checked> Нет
                </div>
                <div class="col-2">
                    <label>Балл:</label>
                    <input type="number" name="answers[0][weight]" class="form-control" value="0">
                </div>
            </div>

            {{-- Ответ 2 --}}
            <div class="row mb-2 align-items-center answer-item">
                <div class="col-6">
                    <label>Ответ 2:</label>
                    <input type="text" name="answers[1][text]" class="form-control" required>
                </div>
                <div class="col-2">
                    <label>Правильный?</label><br>
                    <input type="radio" name="answers[1][is_correct]" value="1"> Да
                    <input type="radio" name="answers[1][is_correct]" value="0" checked> Нет
                </div>
                <div class="col-2">
                    <label>Балл:</label>
                    <input type="number" name="answers[1][weight]" class="form-control" value="0">
                </div>
            </div>

            

        <button type="button" id="add-answer" class="btn btn-primary mt-3">Добавить ещё ответ</button>

        <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
    </form>
</div>
@endsection




