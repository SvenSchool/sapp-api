<?php

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
            $table->increments('id');

            // Authentication
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();

            // Meta data
            $table->string('first_name');
            $table->string('insertion')->nullable();
            $table->string('last_name');

            // The user type
            $table->integer('type_id')->unsigned()->index();
            $table->foreign('type_id')
                  ->references('id')
                  ->on('types')
                  ->onDelete('cascade');

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
        Schema::drop('users');
    }
}
