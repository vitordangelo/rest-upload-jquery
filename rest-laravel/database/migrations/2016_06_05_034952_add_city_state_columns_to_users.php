<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityStateColumnsToUsers extends Migration
{

    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('city', 50)->after('password');
            $table->string('state', 2)->after('city');
        });
    }

    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn('city');
            $table->dropColumn('state');
        });
    }
}
