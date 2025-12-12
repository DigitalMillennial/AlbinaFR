@extends('layouts.admin')

@section('title', 'Tableau de bord')
@section('page-title', 'Dashboard')

@section('content')
<section id="section-dashboard" class="content-section active">
  <div class="stats-grid">
    <!-- Статистика 1: Всего студентов -->
    <div class="stat-card">
      <div class="stat-icon blue">
        <i class="fas fa-users"></i>
      </div>
      <div class="stat-info">
        <div class="stat-value">248</div>
        <div class="stat-label">Étudiants inscrits</div>
      </div>
    </div>

    <!-- Статистика 2: Активные курсы -->
    <div class="stat-card">
      <div class="stat-icon green">
        <i class="fas fa-book-open"></i>
      </div>
      <div class="stat-info">
        <div class="stat-value">12</div>
        <div class="stat-label">Cours actifs</div>
      </div>
    </div>

    <!-- Статистика 3: Заявки -->
    <div class="stat-card">
      <div class="stat-icon orange">
        <i class="fas fa-calendar-check"></i>
      </div>
      <div class="stat-info">
        <div class="stat-value">45</div>
        <div class="stat-label">Réservations ce mois</div>
      </div>
    </div>

    <!-- Статистика 4: Доход -->
    <div class="stat-card">
      <div class="stat-icon purple">
        <i class="fas fa-euro-sign"></i>
      </div>
      <div class="stat-info">
        <div class="stat-value">8,450€</div>
        <div class="stat-label">Revenus ce mois</div>
      </div>
    </div>
  </div>

  <!-- Последние заявки -->
  <div class="dashboard-row">
    <div class="card">
      <div class="card-header">
        <h3>Dernières réservations</h3>
        <a href="#">Voir tout</a>
      </div>
      <div class="table-responsive">
        <table class="data-table">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Cours/Service</th>
              <th>Date</th>
              <th>Statut</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Marie Dupont</td>
              <td>Cours individuel</td>
              <td>15/01/2025</td>
              <td><span class="badge badge-success">Confirmé</span></td>
            </tr>
            <tr>
              <td>Jean Martin</td>
              <td>Groupe A2</td>
              <td>16/01/2025</td>
              <td><span class="badge badge-warning">En attente</span></td>
            </tr>
            <tr>
              <td>Sophie Bernard</td>
              <td>Traduction orale</td>
              <td>17/01/2025</td>
              <td><span class="badge badge-success">Confirmé</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
