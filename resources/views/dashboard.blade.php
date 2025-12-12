<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    <aside class="w-64 bg-white shadow-md">
        <div class="p-6 text-xl font-bold text-gray-800">Admin</div>
        <nav class="mt-6">
            <ul class="space-y-2">
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Étudiants</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Clients</a></li>
                <li>
  <a href="{{ route('admin.courses.index') }}" class="block px-4 py-2 hover:bg-gray-200">
    Cours
  </a>
</li>

                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Contenu</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Paiements</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Planning</a></li>
            </ul>
        </nav>
    </aside>

    {{-- Main Panel --}}
    <main class="flex-1 p-8">
        <h1 class="text-2xl font-semibold text-gray-700 mb-6">Tableau de bord</h1>

        {{-- Stat Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h2 class="text-lg font-medium text-gray-600">Groupes actifs</h2>
                <p class="text-3xl font-bold text-indigo-600 mt-2">0</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h2 class="text-lg font-medium text-gray-600">Visites du site</h2>
                <p class="text-3xl font-bold text-indigo-600 mt-2">0</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h2 class="text-lg font-medium text-gray-600">Demandes reçues</h2>
                <p class="text-3xl font-bold text-indigo-600 mt-2">0</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h2 class="text-lg font-medium text-gray-600">Paiements aujourd’hui</h2>
                <p class="text-3xl font-bold text-indigo-600 mt-2">0</p>
            </div>
        </div>

        {{-- Chart --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-medium text-gray-600 mb-4">Visites du site (7 derniers jours)</h2>
            <canvas id="visitsChart" height="100"></canvas>
        </div>
    </main>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('visitsChart').getContext('2d');
    const visitsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
            datasets: [{
                label: 'Visites',
                data: [120, 150, 180, 200, 170, 90, 60],
                backgroundColor: 'rgba(99, 102, 241, 0.6)',
                borderColor: 'rgba(99, 102, 241, 1)',
                borderWidth: 1,
                borderRadius: 4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 50
                    }
                }
            }
        }
    });
</script>

</body>
</html>
