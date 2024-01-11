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

Route::middleware('auth')->group(function () {
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // quizzes
    Route::get('/', [QuizController::class, 'publicQuizzes'])->name('quizzes');
    Route::get('/add-quiz', [QuizController::class, 'add'])->name('quizzes.add');
    Route::post('/add-quiz', [QuizController::class, 'create'])->name('quizzes.create');
    Route::get('/my-quizzes', [QuizController::class, 'my'])->name('quizzes.my');
    Route::delete('/my-quizzes/{id}', [QuizController::class, 'remove'])->name('quizzes.remove');
    Route::get('/quiz/{id}', [QuizController::class, 'getOne'])->middleware(['quiz.permission'])->name('quizzes.quiz');
    Route::get('/quiz/edit/{id}', [QuizController::class, 'edit'])->name('quizzes.edit');
    Route::patch('/quiz/edit/{id}', [QuizController::class, 'update'])->name('quizzes.update');
    // questions
    Route::post('/question/{quiz_id}', [QuestionController::class, 'create'])->name('question.create');
    Route::delete('/question/{id}', [QuestionController::class, 'delete'])->name('question.delete');
    // test
    Route::get('/test/{quiz_id}', [QuizController::class, 'test'])->name('test');
    Route::post('/check-question', [QuizController::class, 'checkQuestion'])->name('test.check');
    Route::get('/test-finish', [QuizController::class, 'testFinish'])->name('test.finish');
    //admin
    Route::get('/admin', [QuizController::class, 'allQuizzes'])->middleware(['admin'])->name('admin');
    Route::patch('/update-quiz-status/{quiz_id}', [QuizController::class, 'updateQuizStatus'])->middleware(['admin'])->name('admin.update-quiz-status');
});

require __DIR__.'/auth.php';
