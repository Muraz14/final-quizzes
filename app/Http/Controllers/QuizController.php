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

        $quesitons_count = Question::where('quiz_id', $id)->count();

        $not_startable = !$quesitons_count;

        return view('quizzes.quiz', [
            "quiz" => $quiz,
            "author_name" => $author->name,
            "not_startable" => $not_startable,
            "quesitons_count" => $quesitons_count
        ]);
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

    public function test(Request $request, $quiz_id)
    {
        $question_num = $request->query('question');

        $questions = Question::where(['quiz_id' => $quiz_id]);
        
        if ($questions->count() < $question_num) {
            return redirect('/quiz/' . $quiz_id);
        }

        $curr_question = $questions->get()[$question_num - 1];

        return view('quizzes.test', [
            'curr_question' => $curr_question,
            'quiz_id' => $quiz_id,
            'question_num' => $question_num,
            'questions_count' => $questions->count()
        ]);
    }

    public function checkQuestion(Request $request)
    {
        $question = Question::where(['quiz_id' => $request->quiz_id])->get()[$request->question - 1];

        if ($request->checkedAnswer != $question->correct_answer) {
            return response()->json([
                'answer' => false,
                'correct_answer' => $question->correct_answer,
            ]);
        }

        return response()->json(['answer' => true]);
    }

    public function testFinish(Request $request)
    {
        return view('quizzes.quiz-finish');
    }
}
