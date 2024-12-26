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
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID as the primary key
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete(); // Foreign key referencing 'users' UUID
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('status')->default('to_do');//, ['to_do', 'doing', 'done'] more flexable than enum
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
