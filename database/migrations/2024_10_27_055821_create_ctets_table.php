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
        Schema::create('ctets', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('subject_name'); // Column for subject name
            $table->string('topic');         // Column for topic
            $table->enum('status', ['Beginning', 'Average', 'Complete']); // Column for status
            $table->date('date');            // Column for date
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctets');
    }
};
