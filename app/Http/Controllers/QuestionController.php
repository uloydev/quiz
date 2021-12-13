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

    public function destroy($quiz, Question $question) 
    {
        $question->delete();
        return redirect()->back()->withSuccess('question deleted');
    }

    public function edit($quiz, $question)
    {
        return view('admin.quiz.question.edit', [
            'question' => Question::with('options')->find($question)
        ]);
    }
}
