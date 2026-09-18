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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('company');
            $table->string('company_url')->nullable();
            $table->string('location')->nullable();
            $table->string('start_date');
            $table->string('end_date')->default('Present');
            $table->boolean('is_current')->default(false);
            $table->text('description')->nullable();
            $table->json('highlights')->nullable();
            $table->json('technologies')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
