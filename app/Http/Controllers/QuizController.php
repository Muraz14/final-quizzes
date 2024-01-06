<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function edit(Request $request)
    {
        return view('quizzes.add-quiz');
    }

    public function add(Request $request)
    {
        Quiz::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $request->image,
            "user_id" => Auth::id(),
        ]);

        
        return redirect(RouteServiceProvider::HOME);
    }
}
