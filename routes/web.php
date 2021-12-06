<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::redirect('/', '/login');

// user routes
Route::middleware(['auth', 'roleCheck:user'])->name('user.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\QuizController::class, 'index'])->name('dashboard');
    Route::get('/history', [App\Http\Controllers\QuizController::class, 'history'])->name('history');
    Route::get('/quiz/{quiz}/attemp', [App\Http\Controllers\QuizController::class, 'attemp'])->name('attemp');
    Route::post('/quiz/{quiz}/attemp', [App\Http\Controllers\QuizController::class, 'finishAttemp']);
});

// admin routes
Route::name('admin.')->middleware(['auth', 'roleCheck:admin'])->prefix('admin')->group(function () {
    Route::redirect('/', '/dashboard');
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

});
