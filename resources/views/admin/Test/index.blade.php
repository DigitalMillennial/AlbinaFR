@extends('layouts.admin')

@section('title', 'Список вопросов')

@section('content')
<section class="content-section active">

    <div class="container">
        <h1>Список вопросов</h1>

        {{-- ================= QUESTIONS ================= --}}
        <div class="section-header">
            <h2>Questions et réponses du test</h2>
            <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajouter une question
            </a>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table class="data-table" id="questionsTable">
                    <thead>
                        <tr>
                            <th>Questions</th>
                            <th>Réponses</th>
                            <th>Points</th>
                            <th>Niveau</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{ $question->text_fr }}</td>
                                <td>
                                    @foreach($question->answers as $answer)
                                        <div>{{ $answer->text }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($question->answers as $answer)
                                        @if($answer->is_correct)
                                            {{ $answer->weight }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <select class="form-select form-select-sm level-select" disabled>
                                        <option value="1" {{ $question->difficulty == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $question->difficulty == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $question->difficulty == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $question->difficulty == 4 ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $question->difficulty == 5 ? 'selected' : '' }}>5</option>
                                        <option value="6" {{ $question->difficulty == 6 ? 'selected' : '' }}>6</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="{{ route('admin.questions.edit', $question) }}" class="btn-action" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.questions.destroy', $question) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-action btn-danger" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ================= RESULTATS / REPRÉSENTATION ================= --}}
        <div class="section-header mt-5">
            <h2>Résultats et niveaux</h2>
            <a href="{{ route('admin.resultats_test.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajouter un résultat
            </a>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table class="data-table" id="resultatsTable">
                    <thead>
                        <tr>
                            <th>Min</th>
                            <th>Max</th>
                            <th>Niveau</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resultats as $resultat)
                            <tr>
                                <td>{{ $resultat->min }}</td>
                                <td>{{ $resultat->max }}</td>
                                <td>
                                    <select class="form-select form-select-sm level-select" disabled>
                                        <option value="A0" {{ $resultat->niveau == 'A0' ? 'selected' : '' }}>A0</option>
                                        <option value="A1" {{ $resultat->niveau == 'A1' ? 'selected' : '' }}>A1</option>
                                        <option value="A2" {{ $resultat->niveau == 'A2' ? 'selected' : '' }}>A2</option>
                                        <option value="B1" {{ $resultat->niveau == 'B1' ? 'selected' : '' }}>B1</option>
                                        <option value="B2" {{ $resultat->niveau == 'B2' ? 'selected' : '' }}>B2</option>
                                        <option value="C1" {{ $resultat->niveau == 'C1' ? 'selected' : '' }}>C1</option>
                                        <option value="C2" {{ $resultat->niveau == 'C2' ? 'selected' : '' }}>C2</option>
                                    </select>
                                </td>
                                <td>{{ $resultat->message }}</td>
                                <td>
                                    <a href="{{ route('admin.resultats_test.edit', $resultat) }}" class="btn-action" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.resultats_test.destroy', $resultat) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-action btn-danger" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ================= SAVE BUTTON ================= --}}
        <div class="text-center mt-4 mb-5">
            <button class="btn btn-primary btn-lg">
                <i class="fas fa-save"></i> Sauvegarder le texte
            </button>
        </div>

    </div>
</section>

@endsection
