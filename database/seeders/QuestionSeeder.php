<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quizId = 1;

        $questions = [
            [
                'question' => 'What is the capital of France?',
                'image' => 'https://a.cdn-hotels.com/gdcs/production107/d625/d22d2448-0238-4573-b055-6b079e972dbb.jpg?impolicy=fcrop&w=800&h=533&q=medium',
                'answer_1' => 'Berlin',
                'answer_2' => 'Madrid',
                'answer_3' => 'Rome',
                'answer_4' => 'Paris',
                'correct_answer' => 'Paris',
            ],
            [
                'question' => 'What is the capital of Germany?',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Museumsinsel_Berlin_Juli_2021_1_%28cropped%29.jpg/1200px-Museumsinsel_Berlin_Juli_2021_1_%28cropped%29.jpg',
                'answer_1' => 'Paris',
                'answer_2' => 'Madrid',
                'answer_3' => 'Rome',
                'answer_4' => 'Berlin',
                'correct_answer' => 'Berlin',
            ],
            [
                'question' => 'What is the capital of Italy?',
                'image' => 'https://www.fodors.com/assets/destinations/54492/colosseum-ancient-rome-rome-italy-europe_980x650.jpg',
                'answer_1' => 'Berlin',
                'answer_2' => 'Madrid',
                'answer_3' => 'Rome',
                'answer_4' => 'Paris',
                'correct_answer' => 'Rome',
            ],
            [
                'question' => 'What is the capital of Spain?',
                'image' => 'https://www.travelandleisure.com/thmb/oNo7zAZGMDBGXiegpzjfIc5IUsg=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/TAL-circulo-de-bella-artes-TODOMADRID0723-45c9757f16f54de6861984cf82ae4034.jpg',
                'answer_1' => 'Berlin',
                'answer_2' => 'Madrid',
                'answer_3' => 'Rome',
                'answer_4' => 'Paris',
                'correct_answer' => 'Madrid',
            ],
        ];

        foreach ($questions as $question) {
            $question['quiz_id'] = $quizId;

            DB::table('questions')->insert([
                'question' => $question['question'],
                'image' => $question['image'],
                'answer_1' => $question['answer_1'],
                'answer_2' => $question['answer_2'],
                'answer_3' => $question['answer_3'],
                'answer_4' => $question['answer_4'],
                'correct_answer' => $question['correct_answer'],
                'quiz_id' => $question['quiz_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
