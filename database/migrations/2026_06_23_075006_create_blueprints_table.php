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
        Schema::create('blueprints', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->string('name');
            $table->text('description')->nullable();

            // Writing behavior
            $table->string('tone'); // e.g. "professional", "casual", "technical"
            $table->string('target_platform')->default('x'); // x, linkedin, etc

            $table->integer('max_length')->default(280);

            // Structure rules for AI
            $table->json('structure_rules')->nullable();
            // example: ["hook", "body_points", "conclusion"]

            // Style rules
            $table->json('style_rules')->nullable();
            // example: ["use short sentences", "no emojis", "use analogies"]

            // Hashtag strategy
            $table->json('hashtag_strategy')->nullable();
            // example: ["tech", "trending", "minimal"]

            // // AI configuration snapshot
            // $table->json('ai_config')->nullable();
            // // model, temperature, etc

            $table->boolean('is_active')->default(true);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blueprints');
    }
};
