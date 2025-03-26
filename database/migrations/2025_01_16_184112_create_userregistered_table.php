<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('userregistered', function (Blueprint $table) {
        $table->id(); // Auto-incrementing primary key
        $table->string('full_name'); // Full name of the user
        $table->string('email')->unique(); // Email address (unique)
        $table->string('phone'); // Phone number
        $table->string('password'); // Password (hashed)
        $table->timestamps(); // Adds `created_at` and `updated_at` columns
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userregistered');
    }
};
