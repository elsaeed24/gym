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
        Schema::create('couches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('gym_id')->nullable()->constrained('gyms')->nullOnDelete();
            $table->enum('gender',['male','female'])->default('male');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couches');
    }
};
