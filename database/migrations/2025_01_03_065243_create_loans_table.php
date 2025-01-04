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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('loan');
            $table->string('loan_options')->nullable();
            $table->string('options')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('car_number')->nullable();
            $table->string('salary_per_month')->nullable();
            $table->string('loan_amount')->nullable();
            $table->string('message')->nullable();
            $table->string('rc_copy')->nullable();
            $table->string('authorise');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
