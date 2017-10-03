<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('social_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('social_id');
            $table->integer('usuario_clientes_id')->unsigned();
            $table->foreign('usuario_clientes_id')->references('id')->on('usuario_clientes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_profiles');
    }
}
