<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quizzes')->insert([
            'id' => 1,
            'title' => 'World Capitals Challenge',
            'description' => 'Embark on a global journey and test your knowledge of capital cities with our "World Capitals Challenge" quiz! ',
            'image' => 'https://www.psychologicalscience.org/redesign/wp-content/uploads/2022/04/Earth-Day-Online-1-1024x819.jpg',
            'user_id' => 1,
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
