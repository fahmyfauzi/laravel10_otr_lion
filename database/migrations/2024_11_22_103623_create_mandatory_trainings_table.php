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
        Schema::create('mandatory_trainings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('human_factory');
            $table->string('sms_training');
            $table->string('rvsm_pbn_training');
            $table->string('etops_training')->nullable();
            $table->string('rii_training')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandatory_trainings');
    }
};
