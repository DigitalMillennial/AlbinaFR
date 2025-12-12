@extends('layouts.admin')


@section('title', 'Gestion des cours')
@section('page-title', 'Gestion des cours')



@section('content')


    <!-- ============================================ -->
    <!-- COURSES SECTION - Управление курсами -->
    <!-- ============================================ -->
    <section class="content-section active">
      <div class="section-header">
        <h2>Gestion des cours</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
         <i class="fas fa-plus"></i> Ajouter un cours
        </button>
      </div>

      <div class="card">
        <div class="table-responsive">
          <table class="data-table">
            <thead>
              <tr>
                <th>Nom du cours</th>
                <th>Niveau</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Durée</th>
                <th>Statut</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="coursesTableBody">
  @foreach ($courses as $course)
    <tr>
      <td>{{ $course->title }}</td>
      <td>{{ $course->niveau }}</td>
      <td>{{ $course->type }}</td>
      <td>{{ $course->price }}€</td>
      <td>{{ $course->nb_lessons }}h</td>
      <td>
        @if ($course->is_active)
          <span class="badge badge-success">Actif</span>
        @else
          <span class="badge badge-secondary">Inactif</span>
        @endif
      </td>
      <td>
        <button class="btn-action" onclick="editCourse({{ $course->id }})" title="Modifier">
  <i class="fas fa-edit"></i>
</button>
        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Supprimer ce cours ?')">
  @csrf
  @method('DELETE')
  <button class="btn-action" type="submit" title="Supprimer">
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
    </section>

  </main>

  <!-- ============================================ -->
  <!-- MODAL CONTAINER - Контейнер для модальных окон -->
  <!-- ============================================ -->
  <div id="modalContainer"></div>

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="addCourseModalLabel">Ajouter un cours</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <form action="{{ route('admin.courses.store') }}" method="POST" id="courseForm">
        @csrf
        <div class="modal-body">
          <div class="row g-3">

            <!-- Nom + Niveau -->
            <div class="col-md-6">
              <label for="title" class="form-label">Nom du cours</label>
              <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="niveau" class="form-label">Niveau</label>
              <select class="form-select" name="niveau" required>
                  <option value="">Sélectionner...</option>
                  <option value="A1">A1</option>
                  <option value="A2">A2</option>
                  <option value="B1">B1</option>
                  <option value="B2">B2</option>
                  <option value="C1">C1</option>
                  <option value="all">Tous niveaux</option>
                </select>
            </div>

            <!-- Type + Prix -->
            <div class="col-md-6">
              <label for="type" class="form-label">Type</label>
              <select name="type" id="type" class="form-select" required>
                <option value="">Sélectionner...</option>
                <option value="individuel">Individuel</option>
                <option value="groupe">Groupe</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="price" class="form-label">Prix (€)</label>
              <input type="number" name="price" id="price" class="form-control" min="0" step="0.01" required>
            </div>

            <!-- Durée + Statut на одной линии -->
            <div class="col-md-6">
              <label class="form-label">Durée</label>
              <div class="row g-2">
                <div class="col-md-6">
                  <input type="number" name="nb_lessons" id="nb_lessons" class="form-control" placeholder="Heures" min="0" required>
                </div>
                <div class="col-md-6">
                  <input type="number" name="duration_weeks" id="duration_weeks" class="form-control" placeholder="Semaines" min="0">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <label for="is_active" class="form-label">Statut</label>
              <select name="is_active" id="is_active" class="form-select" required>
                <option value="active">Actif</option>
                <option value="inactive">Inactif</option>
              </select>
            </div>

            <!-- Description -->
            <div class="col-12">
              <label for="description" class="form-label">Description</label>
              <textarea name="description" id="description" class="form-control" rows="1" required></textarea>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection


