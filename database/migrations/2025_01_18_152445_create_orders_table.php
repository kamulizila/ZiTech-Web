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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('domain_name');
            $table->decimal('price', 10, 2); // 10 digits total, 2 digits after the decimal
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique(); // Ensure email is unique
            $table->string('phone');
            $table->string('company_name')->nullable();
            $table->string('street_address');
            $table->string('street_address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('postcode');
            $table->string('country')->default('Tanzania');
            $table->string('password'); // Store hashed password
            $table->string('payment_method');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
