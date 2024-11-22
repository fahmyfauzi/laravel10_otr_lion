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
        Schema::create('lion_air_air_craft_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('otr_application_id')->constrained('otr_applications')->onDelete('cascade');
            $table->string('air_craft_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lion_air_air_craft_types');
    }
};
