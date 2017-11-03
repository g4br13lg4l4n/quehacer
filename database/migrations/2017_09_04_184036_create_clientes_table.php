<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa');
            $table->string('colonia')->nullable();
            $table->string('direccion');
            $table->string('establecimiento')->nullable();
            $table->string('estado');
            $table->string('municipio')->nullable();
            $table->string('rfc')->nullable();
            $table->string('correo');
            $table->string('phone');
            $table->string('responsable')->nullable();
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
