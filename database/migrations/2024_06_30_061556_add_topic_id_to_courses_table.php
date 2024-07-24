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
        Schema::table('courses', function ($table) {
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->foreign('topic_id')->references('id')->on('topics');
            // You can adjust the data type and other options as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function ($table) {
            $table->dropForeign(['topic_id']);
            $table->dropColumn('topic_id');
        });
    }
};
