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
        Schema::create('assessments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('quality_inspector_id')->constrained('users')->nullable();
            $table->foreignUuid('authorize_laca_id')->constrained('authorize_lacas');
            $table->foreignUuid('mandatory_training_id')->constrained('mandatory_trainings');
            $table->integer('assessment_material_1')->nullable();
            $table->integer('assessment_material_2')->nullable();
            $table->integer('assessment_material_3')->nullable();
            $table->integer('assessment_material_4')->nullable();
            $table->integer('assessment_material_5')->nullable();
            $table->integer('assessment_material_6')->nullable();
            $table->integer('assessment_material_7')->nullable();
            $table->integer('assessment_material_8')->nullable();
            $table->integer('assessment_material_9')->nullable();
            $table->decimal('assessment_result', 5, 2)->nullable();
            $table->enum('status', ['pass', 'fail'])->nullable();
            $table->timestamp('asessed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asessments');
    }
};
