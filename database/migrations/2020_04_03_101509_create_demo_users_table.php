<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 35)->nullable();
            $table->string('email', 255)->nullable();
            $table->text('file')->nullable();
            $table->text('address')->nullable();
            $table->unsignedInteger('zipcode')->nullable();
            $table->unsignedBigInteger('mobile_number')->nullable();
            $table->string('date', 10)->nullable();
            $table->string('time', 5)->nullable();
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
        Schema::dropIfExists('demo_users');
    }
}
