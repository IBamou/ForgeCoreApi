<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->index('title');
            $table->index('process_status');
            $table->index('status');
        });

        Schema::table('blueprints', function (Blueprint $table) {
            $table->index('name');
            $table->index('tone');
            $table->index('target_platform');
            $table->index('is_active');
        });

        Schema::table('inputs', function (Blueprint $table) {
            $table->index('title');
        });

        Schema::table('agent_conversations', function (Blueprint $table) {
            $table->index('title');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex(['title']);
            $table->dropIndex(['process_status']);
            $table->dropIndex(['status']);
        });

        Schema::table('blueprints', function (Blueprint $table) {
            $table->dropIndex(['name']);
            $table->dropIndex(['tone']);
            $table->dropIndex(['target_platform']);
            $table->dropIndex(['is_active']);
        });

        Schema::table('inputs', function (Blueprint $table) {
            $table->dropIndex(['title']);
        });

        Schema::table('agent_conversations', function (Blueprint $table) {
            $table->dropIndex(['title']);
        });
    }
};
