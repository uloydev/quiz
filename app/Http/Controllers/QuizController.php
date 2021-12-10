<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Attemp;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        return view('admin.quiz.index',[
            'quizzes' => Quiz::withCount('attemps')->paginate(5)->withQueryString(),
        ]);
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('admin.quiz.index')->with('success', 'Quiz deleted succesfuly!');
    }

    public function availableQuiz()
    {
        $attempsQuizId = Attemp::where('user_id', Auth::id())->pluck('quiz_id');

        return view('user.dashboard', [
            'availableQuiz' => Quiz::whereNotIn('id', $attempsQuizId)->withCount('questions')->get(),
        ]);

    }

    public function history()
    {
        return view('user.history', [
            'attempHistory' => Attemp::where('user_id', Auth::id())->get(),
        ]);

    }

    public function attemp(Quiz $quiz)
    {
        $user = Auth::user();
        if (Attemp::where('user_id', $user->id)->firstWhere('quiz_id', $quiz->id)) {
            return redirect()->route('user.history')->withErrors(['you already attemp this quiz !']);
        }

        $quiz = Quiz::with([
            'questions' => function ($query) {
                return $query->with([
                    'options' => function ($query) {
                        return $query->inRandomOrder();
                    },
                ])->inRandomOrder();
            },
        ])->find($quiz->id);

        return view('user.attemp', [
            'quiz' => $quiz,
        ]);
    }

    public function finishAttemp(Request $request,Quiz $quiz)
    {   
        if ($quiz->id == $request->id) {
            $correct = Question::whereIn('answer_option_id', collect($request->questions)->pluck('answer'))->where('quiz_id', $quiz->id)->count();

            $score = round($correct / $quiz->questions_count * 100);

            $attemp = Attemp::create([
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id,
                'score' => $score,
            ]);

            return response()->json([
                'message' => 'success',
                'attemp' => $attemp
            ]);
        } else {
            return abort(404);
        }
    }

    public function allAttemp()
    {
        return view('admin.attemp',[
            'attemps' => Attemp::with(['user', 'quiz'])->whereHas('quiz')->whereHas('user')->paginate('20'),
        ]);
    }
}
