<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('quizzes');

Route::middleware('auth')->group(function () {
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // quizzes
    Route::get('/add-quiz', [QuizController::class, 'add'])->name('quizzes.add');
    Route::post('/add-quiz', [QuizController::class, 'create'])->name('quizzes.create');
    Route::get('/my-quizzes', [QuizController::class, 'my'])->name('quizzes.my');
    Route::delete('/my-quizzes/{id}', [QuizController::class, 'remove'])->name('quizzes.remove');
    Route::get('/quiz/{id}', [QuizController::class, 'getOne'])->name('quizzes.quiz');
    Route::get('/quiz/edit/{id}', [QuizController::class, 'edit'])->name('quizzes.edit');
    Route::patch('/quiz/edit/{id}', [QuizController::class, 'update'])->name('quizzes.update');
    // questions
    Route::post('/question/{quiz_id}', [QuestionController::class, 'create'])->name('question.create');
    Route::delete('/question/{id}', [QuestionController::class, 'delete'])->name('question.delete');
});

require __DIR__.'/auth.php';
