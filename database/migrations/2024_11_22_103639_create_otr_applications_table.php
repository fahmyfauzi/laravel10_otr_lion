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
        Schema::create('otr_applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('personnel_id')->constrained('personnels');
            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignUuid('authorize_laca_id')->constrained('authorize_lacas');
            $table->foreignUuid('mandatory_training_id')->constrained('mandatory_trainings');
            $table->foreignUuid('ame_license_id')->constrained('ame_licenses');
            $table->foreignUuid('assessment_id')->nullable()->constrained('assessments')->onDelete('set null');
            $table->foreignUuid('pic_coodinator_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('pic_status', ['rejected', 'approved'])->nullable()->default(NULL);
            $table->timestamp('submited_at')->nullable();
            $table->timestamp('pic_check_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otr_applications');
    }
};
