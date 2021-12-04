<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Attemp;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $attempsQuizId = Attemp::where('user_id', Auth::id())->pluck('quiz_id');

        return view('user.dashboard', [
            'availableQuiz' => Quiz::whereNotIn('id', $attempsQuizId)->withCount('questions')->get(),
        ]);

    }

    public function history()
    {
        return view('user.history', [
            'attempHistory' => Attemp::where('user_id', Auth::id())->with([
                'quiz' => function ($query) {
                    return $query->withCount('questions');
                },
            ])->get(),
        ]);

    }

    public function attemp(Quiz $quiz)
    {
        $user = Auth::user();
        if (Attemp::where('user_id', $user->id)->firstWhere('quiz_id', $quiz->id)) {
            return redirect()->route('user.history')->withErrors(['you already attemp this quiz !']);
        }
        return view('user.attemp', [
            'quiz' => Quiz::with([
                // 'questions' => function ($query) {
                //     return $query->with([
                //         'options' => function ($query) {
                //             return $query->inRandomOrder();
                //         },
                //     ])->inRandomOrder();
                // },
            ])->find($quiz->id),
        ]);
    }

    public function finishAttemp(Request $request)
    {
        $quiz = $request->json();
        return $quiz->questions;
    }
}
