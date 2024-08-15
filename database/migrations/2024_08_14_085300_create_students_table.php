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
            $table->string('surname');
            $table->string('phone');
            $table->date('birthdate');
            $table->string('birth_city');
            $table->string('school_origin');
            $table->string('student_picture');
            $table->string('address');
            $table->integer('age');
            $table->string('nisn');
            $table->string('gender');
            $table->integer('path_id');
            $table->integer('batch_id');
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
