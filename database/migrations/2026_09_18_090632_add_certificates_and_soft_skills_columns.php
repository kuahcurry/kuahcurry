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
        Schema::table('experiences', function (Blueprint $table) {
            $table->string('certificate_url')->nullable()->after('company_url');
            $table->string('certificate_image')->nullable()->after('certificate_url');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('certificate_url')->nullable()->after('website_url');
            $table->string('certificate_image')->nullable()->after('certificate_url');
        });

        Schema::table('skills', function (Blueprint $table) {
            $table->string('type')->default('technical')->after('name'); // 'technical' or 'soft'
            $table->text('description')->nullable()->after('proficiency');
        });
    }

    public function down(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn(['certificate_url', 'certificate_image']);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['certificate_url', 'certificate_image']);
        });

        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn(['type', 'description']);
        });
    }
};
