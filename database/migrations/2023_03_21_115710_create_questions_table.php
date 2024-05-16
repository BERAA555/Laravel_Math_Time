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
            $table->string("question")->nullable();
            $table->string("photo")->nullable();
            $table->string("answer_1");
            $table->string("answer_2");
            $table->string("answer_3");
            $table->string("answer_4");
            $table->string("answer_5");
            $table->string("true_answer");
            $table->foreignId('test_id')->references('id')->on('tests')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
