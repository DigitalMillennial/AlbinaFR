<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function create(Question $question)
    {
        return view('answers.create', compact('question'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'text' => 'required|string',
            'is_correct' => 'boolean',
            'weight' => 'integer|min:0',
        ]);

        Answer::create($request->only('question_id', 'text', 'is_correct', 'weight'));

        return redirect()->route('questions.show', $request->question_id)->with('success', 'Ответ добавлен');
    }

    public function edit(Answer $answer)
    {
        return view('answers.edit', compact('answer'));
    }

    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'text' => 'required|string',
            'is_correct' => 'boolean',
            'weight' => 'integer|min:0',
        ]);

        $answer->update($request->only('text', 'is_correct', 'weight'));

        return redirect()->route('questions.show', $answer->question_id)->with('success', 'Ответ обновлён');
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return back()->with('success', 'Ответ удалён');
    }
}