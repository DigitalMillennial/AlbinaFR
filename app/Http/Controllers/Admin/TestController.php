<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Support\Facades\Log;
use App\Models\Answer;
use App\Models\ResultatTest;

class TestController extends Controller
{
    public function index()
{
    $questions = Question::with(['answers', 'activeAnswer'])->get();
    $answers   = Answer::with('question')->get();
    $resultats = ResultatTest::all();
    return view('admin.test.index', compact('questions', 'answers', 'resultats'));
}
}
