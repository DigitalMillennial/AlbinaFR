<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResultatTest;
use Illuminate\Http\Request;

class ResultatTestController extends Controller
{
    public function index()
    {
        $levels = ResultatTest::all();
        return view('admin.resultats_test.index', compact('levels'));
    }

    public function create()
    {
        return view('admin.resultats_test.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'min' => 'required|integer|min:0|max:20',
            'max' => 'required|integer|min:0|max:20|gte:min',
            'niveau' => 'required|in:A0,A1,A2,B1,B2,C1,C2',
            'message' => 'required|string|max:1000',
        ]);

        ResultatTest::create($request->all());

        return redirect()->route('admin.resultats_test.index')
                         ->with('success', 'Résultat créé avec succès');
    }

    public function edit(ResultatTest $resultatTest)
    {
        return view('admin.resultats_test.edit', compact('resultatTest'));
    }

    public function update(Request $request, ResultatTest $resultatTest)
    {
        $request->validate([
            'min' => 'required|integer|min:0|max:20',
            'max' => 'required|integer|min:0|max:20|gte:min',
            'niveau' => 'required|in:A0,A1,A2,B1,B2,C1,C2',
            'message' => 'required|string|max:1000',
        ]);

        $resultatTest->update($request->all());

        return redirect()->route('admin.resultats_test.index')
                         ->with('success', 'Résultat mis à jour avec succès');
    }

    public function destroy(ResultatTest $resultatTest)
    {
        $resultatTest->delete();
        return redirect()->route('admin.resultats_test.index')
                         ->with('success', 'Résultat supprimé');
    }
}
