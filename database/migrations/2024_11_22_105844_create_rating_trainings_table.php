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
        Schema::create('rating_trainings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('otr_application_id')->constrained('otr_applications')->onDelete('cascade');
            $table->string('course');
            $table->integer('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_trainings');
    }
};
