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
        Schema::create('authorize_lacas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('authorization_date')->default(now());
            $table->string('type');
            $table->string('no');
            $table->string('validy');
            $table->boolean('mr')->default(false);
            $table->boolean('rii')->default(false);
            $table->boolean('etops')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorize_lacas');
    }
};
