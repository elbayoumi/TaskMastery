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
        Schema::create('task_category_task', function (Blueprint $table) {
            $table->id();
             // Use UUID for task_id and category_id instead of auto-incrementing integers
        $table->uuid('task_id');
        $table->uuid('category_id');

        // Define foreign key relationships with UUID references
        $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        $table->foreign('category_id')->references('id')->on('task_categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_category_task');
    }
};
