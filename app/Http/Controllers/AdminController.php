<?php

namespace App\Http\Controllers;

use App\Models\Attemp;
use App\Models\Quiz;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'userCount' => User::count(),
            'attempCount' => Attemp::count(),
            'quizCount' => Quiz::count(),
        ]);
    }
}
