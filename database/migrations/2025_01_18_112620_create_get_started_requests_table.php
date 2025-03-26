<?php

// database/migrations/xxxx_xx_xx_create_get_started_requests_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetStartedRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('get_started_requests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('company_name');
            $table->string('company_location');
            $table->text('company_address');
            $table->string('service_type');
            $table->text('system_proposal');
            $table->string('document_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('get_started_requests');
    }
}
