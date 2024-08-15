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
        Schema::create('registration_batchs', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name');
            $table->string('batch_type'); //fill batch type from path_type
            $table->date('open_date');
            $table->date('closed_date');
            $table->timestamps();

            //relations
            $table->foreignId('path_id')->constrained('registration_paths')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_batchs');
    }
};
