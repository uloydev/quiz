<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index',[
            'users' => User::withCount('attemps')->where('is_admin', false)->paginate(5)->withQueryString(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $email = $user->email;
        $user->delete();
        return redirect()->route('admin.user.index')->withSuccess('User '.$email.' deleted succesfuly!');
    }
}
