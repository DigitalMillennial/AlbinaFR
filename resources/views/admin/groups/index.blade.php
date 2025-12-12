@extends('layouts.admin')

@section('title', 'Gestion des groups')
@section('page-title', 'Gestion des groups')

@section('content')
    <!-- ============================================ -->
    <!-- GROUPS SECTION - Управление группами -->
    <!-- ============================================ -->
    <section class="content-section active">
      <div class="section-header">
        <h2>Gestion des groupes</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGroupModal">
         <i class="fas fa-plus"></i> Ajouter un groupe
        </button>
      </div>

      <div class="card">
        <div class="table-responsive">
          <table class="data-table">
            <thead>
              <tr>
                <th>Group</th>
                <th>Niveau</th>
                <th>Cours</th>
                <th>Capacity</th>
                <th>Date debut</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="groupsTableBody">
              @foreach ($groups as $group)
                <tr>
                  <td>{{ $group->group_name }}</td>
                  <td>{{ $group->course->niveau }}</td>
                  <td>{{ $group->course->title ?? '—' }}</td>
                  <td>{{ $group->capacity }}</td>
                  <td>{{ $group->start_date }}</td>
                  <td>
                    <a href="{{ route('admin.groups.edit', $group->id) }}" class="btn-action" title="Modifier">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Supprimer ce groupe ?')">
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
  <!-- MODAL AJOUTER GROUPE -->
  <!-- ============================================ -->
  <div class="modal fade" id="addGroupModal" tabindex="-1" aria-labelledby="addGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="addGroupModalLabel">Ajouter un groupe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>

        <form action="{{ route('admin.groups.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="row g-3">

              <!-- Nom du groupe -->
              <div class="col-md-6">
                <label for="group_name" class="form-label">Nom du groupe</label>
                <input type="text" name="group_name" id="group_name" class="form-control" required>
              </div>

              <!-- Sélection du cours -->
              <div class="col-md-6">
                <label for="course_id" class="form-label">Cours</label>
                <select class="form-select" name="course_id" id="course_id" required>
                  <option value="">Sélectionner...</option>
                  @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                  @endforeach
                </select>
              </div>

              <!-- Date de début -->
              <div class="col-md-6">
                <label for="start_date" class="form-label">Date de début</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
              </div>

              <!-- Capacité -->
              <div class="col-md-6">
                <label for="capacity" class="form-label">Capacité</label>
                <input type="number" name="capacity" id="capacity" class="form-control" min="1" required>
              </div>

              <!-- Horaire (до 5 строк) -->
<div class="col-12">
  <label class="form-label">Horaire des cours (jusqu'à 5)</label>

  @for ($i = 0; $i < 5; $i++)
    <div class="row g-2 mb-2">
      <div class="col-md-4">
        <select name="schedule[{{ $i }}][jour_semaine]" class="form-select">
          <option value="">Jour...</option>
          <option value="lundi">Lundi</option>
          <option value="mardi">Mardi</option>
          <option value="mercredi">Mercredi</option>
          <option value="jeudi">Jeudi</option>
          <option value="vendredi">Vendredi</option>
          <option value="samedi">Samedi</option>
          <option value="dimanche">Dimanche</option>
        </select>
      </div>
      <div class="col-md-4">
        <input type="time" name="schedule[{{ $i }}][heure_debut]" class="form-control">
      </div>
      <div class="col-md-4">
        <input type="time" name="schedule[{{ $i }}][heure_fin]" class="form-control">
      </div>
    </div>
  @endfor
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

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
