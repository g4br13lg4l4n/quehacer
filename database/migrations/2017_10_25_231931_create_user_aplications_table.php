<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_aplications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('idUserFacebook')->unique();
            $table->string('name');
            $table->string('age');
            $table->string('gender');
            $table->string('locations');
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
        Schema::dropIfExists('user_aplications');
    }
}
