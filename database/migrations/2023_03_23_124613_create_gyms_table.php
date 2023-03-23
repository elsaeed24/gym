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
        Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->nullable()->constrained('managers')->nullOnDelete();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->enum('type', ['male', 'female','both'])->default('male');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};
