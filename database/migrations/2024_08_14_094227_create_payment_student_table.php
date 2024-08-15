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
        Schema::create('payment_students', function (Blueprint $table) {
            $table->id();            
            $table->string('name');
            $table->string('bank_name');
            $table->enum('payment_method', ['CASH', 'TRANSFER', 'CASH_INSTALLMENT', 'TRANSFER_INSTALLMENT']);
            $table->string('payment_picture');
            $table->enum('status_payment', ['PENDING', 'CONFIRMED']);
            $table->string('confirmed_by');
            $table->timestamps();

            //relations
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('student_registration_id')->constrained('student_registrations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_students');
    }
};
