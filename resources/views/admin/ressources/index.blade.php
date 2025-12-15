@extends('layouts.admin')

@section('title', 'Gestion des ressources')
@section('page-title', 'Gestion des ressources')

@section('content')

    <!-- ============================================ -->
    <!-- RESOURCES SECTION - Управление ресурсами -->
    <!-- ============================================ -->
    <section class="content-section active">
      <div class="section-header">
        <h2>Gestion des ressources</h2>
        <div class="d-flex align-items-center gap-2">
          <!-- Barre de recherche -->
          <form action="{{ route('admin.ressources.search') }}" method="GET" class="d-flex">
            <input type="text" name="q" class="form-control" placeholder="Rechercher..." />
            <button class="btn btn-secondary ms-2" type="submit">
              <i class="fas fa-search"></i> Rechercher
            </button>
          </form>

          <!-- Bouton Ajouter -->
          <a href="{{ route('admin.ressources.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajouter un matériel
          </a>
        </div>
      </div>

      <div class="card">
        <div class="table-responsive">
          <table class="data-table">
            <thead>
              <tr>
                <th>Titre (FR)</th>
                <th>Description (FR)</th>
                <th>Actions</th>
                <th>Actif</th>
              </tr>
            </thead>
            <tbody id="ressourcesTableBody">
              @foreach ($ressources as $ressource)
                <tr>
                  <td>{{ $ressource['title_fr'] }}</td>
                  <td>{{ \Illuminate\Support\Str::limit($ressource['description_fr'], 80) }}</td>

                  <td>
                    <!-- Télécharger -->
                    <a href="{{ route('admin.ressources.download', $ressource['id']) }}" class="btn-action" title="Télécharger">
                      <i class="fas fa-download"></i>
                    </a>
                    <!-- Modifier -->
                    <button class="btn-action" onclick="editRessource({{ $ressource['id'] }})" title="Modifier">
                      <i class="fas fa-edit"></i>
                    </button>
                    <!-- Supprimer -->
                    <form action="{{ route('admin.ressources.destroy', $ressource['id']) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Supprimer ce matériel ?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn-action" type="submit" title="Supprimer">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                  <td>
                    <!-- Toggle Actif -->
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" 
                             onchange="toggleActive({{ $ressource['id'] }})"
                             @if($ressource['is_active']) checked @endif>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- Bouton Ajouter en bas -->
      <div class="mt-3">
        <a href="{{ route('admin.ressources.create') }}" class="btn btn-primary">
          <i class="fas fa-plus"></i> Ajouter un matériel
        </a>
      </div>
    </section>

  </main>

  <!-- ============================================ -->
  <!-- SCRIPTS -->
  <!-- ============================================ -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
