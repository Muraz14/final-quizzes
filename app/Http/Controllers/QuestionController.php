<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Request $request, $quiz_id)
    {
        $new_question = [
            'question' => $request->question,
            'image' => $request->image,
            'answer_1' => $request->answer1,
            'answer_2' => $request->answer2,
            'answer_3' => $request->answer3,
            'answer_4' => $request->answer4,
            'correct_answer' => $request->correct_answer,
            'quiz_id' => $quiz_id,
        ];

        Question::create($new_question);


        return redirect('/quiz/edit/' . $quiz_id);
    }

    public function delete(Request $request, $id)
    {
        $quiz_id = Question::where(["id" => $id])->first()->quiz_id;
        Question::where(["id" => $id])->delete();

        return redirect('/quiz/edit/' . $quiz_id);
    }
}
