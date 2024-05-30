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
        Schema::create('moduls', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('description');
            // $table->foreignId('university_id')->constrained()->onDelete('cascade');
            // $table->foreignId('department_id')->constrained()->onDelete('cascade');
            // $table->foreignId('study_program_id')->constrained()->onDelete('cascade');
            $table->string('file_name');
            $table->string('file_type');
            $table->string('mime_type');
            $table->binary('file_data');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moduls');
    }
};
