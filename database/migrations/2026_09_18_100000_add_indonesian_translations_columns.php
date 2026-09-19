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
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('title_id')->nullable()->after('title');
            $table->string('tagline_id')->nullable()->after('tagline');
            $table->text('bio_id')->nullable()->after('bio');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('title_id')->nullable()->after('title');
            $table->string('tagline_id')->nullable()->after('tagline');
            $table->string('category_id')->nullable()->after('category');
            $table->text('description_id')->nullable()->after('description');
        });

        Schema::table('experiences', function (Blueprint $table) {
            $table->string('role_id')->nullable()->after('role');
            $table->text('description_id')->nullable()->after('description');
            $table->json('highlights_id')->nullable()->after('highlights');
        });

        Schema::table('education', function (Blueprint $table) {
            $table->string('degree_id')->nullable()->after('degree');
            $table->string('field_of_study_id')->nullable()->after('field_of_study');
            $table->text('description_id')->nullable()->after('description');
            $table->json('achievements_id')->nullable()->after('achievements');
        });

        Schema::table('skills', function (Blueprint $table) {
            $table->string('name_id')->nullable()->after('name');
            $table->text('description_id')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['title_id', 'tagline_id', 'bio_id']);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['title_id', 'tagline_id', 'category_id', 'description_id']);
        });

        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn(['role_id', 'description_id', 'highlights_id']);
        });

        Schema::table('education', function (Blueprint $table) {
            $table->dropColumn(['degree_id', 'field_of_study_id', 'description_id', 'achievements_id']);
        });

        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn(['name_id', 'description_id']);
        });
    }
};
