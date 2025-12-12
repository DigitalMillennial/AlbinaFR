@extends('layouts.admin')

@section('title', 'Ученики')
@section('page-title', 'Étudiants')



@section('content')


 <section class="content-section active">
      <div class="section-header">
        <h2>Gestion des étudiants</h2>
        <button class="btn btn-primary" onclick="openStudentModal()">
          <i class="fas fa-plus"></i> Ajouter un étudiant
        </button>
      </div>

      <div class="card">
        <div class="card-filters">
          <input type="text" class="form-control" placeholder="Rechercher un étudiant..." onkeyup="searchStudents(this.value)">
        </div>
        <div class="table-responsive">
          <table class="data-table">
            <thead>
              <tr>
                
                <th>Nom complet</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Niveau</th>
                <th>Cours suivis</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $student->prenom }} {{ $student->nom }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->telephone }}</td>
            <td><span class="badge badge-info">{{ $student->level }}</span></td>
            <td>
    @foreach($student->courses as $course)
        {{ $course->title }}@if(!$loop->last), @endif
    @endforeach
</td>
            <td>
                <button class="btn-action" onclick="viewStudent({{ $student->id }})" title="Voir">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="btn-action" onclick="editStudent({{ $student->id }})" title="Modifier">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn-action" onclick="deleteStudent({{ $student->id }})" title="Supprimer">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
</tbody>

          </table>
        </div>
      </div>
    </section>

<div id="modalContainer"></div>
@endsection
