<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index(Quiz $quiz)
    {
        return view('admin.quiz.question.index', [
            'quiz' => $quiz,
            'questions' => Question::where('quiz_id', $quiz->id)->paginate(5)->withQueryString()
        ]);
    }
}
