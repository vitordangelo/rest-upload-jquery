<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaDeUsuarios extends Migration
{
    public function up()
    {
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',100);
            $table->string('password',100);
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
