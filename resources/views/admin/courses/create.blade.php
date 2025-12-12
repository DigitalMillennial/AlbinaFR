<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un cours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200 font-semibold text-indigo-600">Cours</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Contenu</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Paiements</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Planning</a></li>
            </ul>
        </nav>
    </aside>

    {{-- Main Panel --}}
    <main class="flex-1 p-8">
        <h1 class="text-2xl font-semibold text-gray-700 mb-6">Créer un nouveau cours</h1>

        <form action="{{ route('admin.courses.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-3xl">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="niveau" class="block font-medium">Niveau</label>
                    <select name="niveau" id="niveau" class="w-full border rounded p-2" required>
                        <option value="A0">A0</option>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                    </select>
                </div>

                <div>
                    <label for="title" class="block font-medium">Titre</label>
                    <input type="text" name="title" id="title" class="w-full border rounded p-2">
                </div>

                <div>
                    <label for="price" class="block font-medium">Prix (€)</label>
                    <input type="number" step="0.01" name="price" id="price" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label for="duration_weeks" class="block font-medium">Durée (semaines)</label>
                    <input type="number" name="duration_weeks" id="duration_weeks" class="w-full border rounded p-2" required>
                </div>

                <div>
                    <label for="nb_lessons" class="block font-medium">Nombre de leçons</label>
                    <input type="number" name="nb_lessons" id="nb_lessons" class="w-full border rounded p-2" required>
                </div>

                <div class="flex items-center mt-6">
                    <input type="checkbox" name="is_active" id="is_active" class="mr-2" checked>
                    <label for="is_active" class="font-medium">Actif</label>
                </div>
            </div>

            <div class="mt-6">
                <label for="description" class="block font-medium">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2" rows="3"></textarea>
            </div>

            <div class="mt-6">
                <label for="programme" class="block font-medium">Programme</label>
                <textarea name="programme" id="programme" class="w-full border rounded p-2" rows="6"></textarea>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Enregistrer le cours
                </button>
            </div>
        </form>
    </main>
</div>

</body>
</html>
