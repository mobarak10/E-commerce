<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('user_name')->unique();
            $table->string('phone_no')->unique();
            $table->string('email')->unique();
            $table->string('password');

            $table->string('street_address');
            $table->string('division_id')->comment('Division table id');
            $table->string('district_id')->comment('district table id');

            $table->unsignedTinyInteger('status')->default(0)->comment('0 = Inactive | 1 = Active | 2 = Ban');
            $table->string('ip_address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('shipping_address')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
