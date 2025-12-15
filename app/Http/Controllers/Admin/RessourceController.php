<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ressource;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RessourceController extends Controller
{
    public function index()
    {
        $ressources = Ressource::all();

        $ressourcesData = $ressources->map(function ($ressource) {
            $id = $ressource->id;

            $titleFr = Translation::where('group', 'resources')
                ->where('key', "title.$id")
                ->where('locale', 'fr')
                ->value('value');

            $descriptionFr = Translation::where('group', 'resources')
                ->where('key', "description.$id")
                ->where('locale', 'fr')
                ->value('value');

            return [
                'id' => $id,
                'file_path' => $ressource->file_path,
                'title_fr' => $titleFr,
                'description_fr' => $descriptionFr,
                'is_active' => $ressource->is_active,
            ];
        });

        // ВАЖНО: передаём именно $ressourcesData
        return view('admin.ressources.index', ['ressources' => $ressourcesData]);
    }

    public function store(Request $request)
    {
        $path = $request->file('file')->store('ressources');

        $ressource = Ressource::create([
            'file_path' => $path,
            'is_active' => $request->has('is_active'),
        ]);

        $id = $ressource->id;

        $translations = [
            ['key' => "title.$id", 'locale' => 'fr', 'value' => $request->title_fr],
            ['key' => "title.$id", 'locale' => 'en', 'value' => $request->title_en],
            ['key' => "title.$id", 'locale' => 'ru', 'value' => $request->title_ru],
            ['key' => "description.$id", 'locale' => 'fr', 'value' => $request->description_fr],
            ['key' => "description.$id", 'locale' => 'en', 'value' => $request->description_en],
            ['key' => "description.$id", 'locale' => 'ru', 'value' => $request->description_ru],
        ];

        foreach ($translations as $t) {
            Translation::create([
                'group' => 'resources',
                'key' => $t['key'],
                'locale' => $t['locale'],
                'value' => $t['value'],
            ]);
        }

        return redirect()->route('admin.ressources.index')
                         ->with('success', 'Ressource ajoutée avec succès');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $ressources = Ressource::where('file_path', 'like', "%$query%")->get();

        return view('admin.ressources.index', ['ressources' => $ressources]);
    }

    public function create()
    {
        return view('admin.ressources.create');
    }

    public function download($id)
    {
        $ressource = Ressource::findOrFail($id);

        return Storage::download($ressource->file_path);
    }
}

