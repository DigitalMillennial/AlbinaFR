<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('answers')->get();
        return view('admin.test.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.test.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text_ru' => 'required|string',
            'text_fr' => 'required|string',
            'text_en' => 'required|string',
            'difficulty' => 'required|integer|min:1|max:6',
            'answers' => 'required|array|min:2',
            'answers.*.text' => 'required|string',
            'answers.*.is_correct' => 'required|boolean',
            'answers.*.weight' => 'nullable|integer',
        ]);

        // создаём вопрос
        $question = Question::create([
            'text_ru' => $request->text_ru,
            'text_fr' => $request->text_fr,
            'text_en' => $request->text_en,
            'difficulty' => $request->difficulty,
        ]);

        // сохраняем ответы
        foreach ($request->answers as $answer) {
            $question->answers()->create([
                'text' => $answer['text'],
                'is_correct' => $answer['is_correct'],
                'weight' => $answer['weight'] ?? 0,
            ]);
        }

        return redirect()->route('admin.questions.index')->with('success', 'Вопрос и ответы сохранены');
    }

    public function edit(Question $question)
    {
        return view('admin.test.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'text_ru' => 'required|string',
            'text_fr' => 'required|string',
            'text_en' => 'required|string',
            'difficulty' => 'required|integer|min:1|max:6',
        ]);

        $question->update($request->only('text_ru', 'text_fr', 'text_en', 'difficulty'));

        return redirect()->route('admin.questions.index')->with('success', 'Вопрос обновлён');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('admin.questions.index')->with('success', 'Вопрос удалён');
    }
}
