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
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->date('registration_date')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('registration_type'); //ini ambil dari registration path type nya
            $table->string('period');
            $table->string('selected_major')->nullable();
            
            $table->timestamps(); 

            //relations
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_registration');
    }
};
