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
        Schema::create('face_pack_appoinment_details', function (Blueprint $table) {
            $table->id();
            $table->string('appoinment_id')->nullable();
            $table->string('history_id')->nullable();
            $table->string('face_pack_id')->nullable();
            $table->string('doctor_id')->nullable();
            $table->string('quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('face_pack_appoinment_details');
    }
};
