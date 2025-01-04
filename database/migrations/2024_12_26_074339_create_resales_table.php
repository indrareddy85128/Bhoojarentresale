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
        Schema::create('resales', function (Blueprint $table) {
            $table->id();
            $table->string('resale_options');
            $table->string('select_flat_size');
            $table->string('furnished');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('message')->nullable();
            $table->string('authorise');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resales');
    }
};
