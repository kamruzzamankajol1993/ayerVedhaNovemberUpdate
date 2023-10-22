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
        Schema::create('diet_charts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->string('patient_id');
            $table->text('early_morning');
            $table->text('brisk_walk');
            $table->text('breakfast');
            $table->text('lunch');
            $table->text('evening');
            $table->text('dinner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diet_charts');
    }
};
