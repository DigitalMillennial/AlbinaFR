<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Translation;

class ContentController extends Controller
{
   public function index(Request $request)
{
    $group = $request->get('group', 'home');
    $translations = Translation::getGroupedByGroup($group);
    return view('admin.content.index', compact('translations', 'group'));
}


public function update(Request $request)
{
    $key = $request->input('key');
    $locales = ['fr', 'ru', 'en'];

    foreach ($locales as $locale) {
        Translation::updateOrCreate(
            ['key' => $key, 'locale' => $locale],
            ['value' => $request->input($locale), 'group' => 'homepage']
        );
    }

   return redirect()->back();
}


public function get($key)
{
    $translations = Translation::where('key', $key)->get();

    if ($translations->isEmpty()) {
        return response()->json(['error' => 'Translation not found'], 404);
    }

    // Собираем переводы по языкам
    $result = [
        'fr' => optional($translations->firstWhere('locale', 'fr'))->value,
        'ru' => optional($translations->firstWhere('locale', 'ru'))->value,
        'en' => optional($translations->firstWhere('locale', 'en'))->value,
    ];

    return response()->json($result);
}



}
