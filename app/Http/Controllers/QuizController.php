<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function add(Request $request)
    {
        return view('quizzes.add-quiz');
    }

    public function create(Request $request)
    {
        Quiz::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $request->image,
            "user_id" => Auth::id(),
        ]);

        
        return redirect('/my-quizzes');
    }

    public function my(Request $request)
    {
        $my_quizzes = Quiz::where('user_id', Auth::id())->get();

        return view('quizzes.my-quizzes', ["my_quizzes" => $my_quizzes]);
    }

    public function remove(Request $request, $id)
    {
        Quiz::where('id', $id)->delete();

        return redirect('/my-quizzes');
    }

    public function getOne(Request $request, $id)
    {
        $quiz = Quiz::where('id', $id)->first();

        $author = User::where('id', $quiz->user_id)->first();

        return view('quizzes.quiz', ["quiz" => $quiz, "author_name" => $author->name]);
    }

    public function edit(Request $request, $id)
    {
        $quiz = Quiz::where('id', $id)->first();
        $questions = Question::where(['quiz_id' => $id])->get();

        return view('quizzes.edit-quiz', ["quiz" => $quiz, "questions" => $questions]);
    }

    public function update(Request $request, $id)
    {
        $updated_quiz = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
        ];

        Quiz::where('id', $id)->update($updated_quiz);

        return redirect('/quiz/' . $id);
    }
}
