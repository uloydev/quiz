<?php

namespace App\Http\Controllers;

use App\Models\Attemp;
use App\Models\Quiz;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $time = now();
        $time->subDays(7);
        $attemps = Attemp::select('created_at')->where('created_at', '>=', $time)->get()->groupBy(function ($item, $key) {
            return $item->created_at->format('d-m-y');
        });
        $timestamps = [];
        for ($i=0; $i < 7; $i++) { 
            $x = now();
            $x->subDays($i);
            $y = $x->format('d-m-y');
            $timestamps[$y] = isset($attemps[$y]) ? $attemps[$y]->count() : 0;
        }

        return view('admin.dashboard', [
            'userCount' => User::count(),
            'attempCount' => Attemp::count(),
            'quizCount' => Quiz::count(),
            'timestamps' => $timestamps,
        ]);
    }
}
