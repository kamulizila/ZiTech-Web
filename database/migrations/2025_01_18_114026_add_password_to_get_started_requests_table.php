<?php

// database/migrations/xxxx_xx_xx_add_password_to_get_started_requests_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordToGetStartedRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('get_started_requests', function (Blueprint $table) {
            $table->string('password')->after('email');
        });
    }

    public function down()
    {
        Schema::table('get_started_requests', function (Blueprint $table) {
            $table->dropColumn('password');
        });
    }
}
