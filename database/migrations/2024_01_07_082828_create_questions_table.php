<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->longText('question');
            $table->longText('image');
            $table->longText('answer_1');
            $table->longText('answer_2');
            $table->longText('answer_3');
            $table->longText('answer_4');
            $table->longText('correct_answer');
            $table->unsignedBigInteger('quiz_id'); 
            $table->index('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['quiz_id']);
            $table->dropIndex(['quiz_id']);
            $table->dropColumn('quiz_id');
        });

        Schema::dropIfExists('questions');
    }
};
