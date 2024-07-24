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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('course_name');
            $table->text('description');
            $table->integer('duration'); // Duration in minutes or hours (adjust as needed)
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('program_id');
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign keys
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('program_id')->references('id')->on('programs');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
};
