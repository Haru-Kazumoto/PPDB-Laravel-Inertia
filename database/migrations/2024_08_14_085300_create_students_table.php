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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('surname')->nullable();
            $table->string('phone');
            $table->date('birthdate')->nullable();
            $table->string('birth_city')->nullable();
            $table->string('school_origin');
            $table->string('student_picture')->nullable();
            $table->string('address')->nullable();
            $table->string('age')->nullable();
            $table->string('nisn')->nullable();
            $table->string('gender');
            $table->integer('path_id')->nullable();
            $table->integer('batch_id')->nullable();
            $table->timestamps();

            //relations
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
