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
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')
            ->constrained('surveys')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('question_id')
            ->constrained('questions')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('subject_id')
            ->constrained('subjects')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_questions');
    }
};
