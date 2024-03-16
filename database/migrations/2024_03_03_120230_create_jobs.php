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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('title');
            $table->string('type');
            $table->string('experience');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->string('location');
            $table->string('deadline');
            $table->text('job_description');
            $table->text('requirement');
            $table->text('benefit');
            $table->timestamps();
            
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
