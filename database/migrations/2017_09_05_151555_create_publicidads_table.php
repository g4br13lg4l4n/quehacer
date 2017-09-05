<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicidads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resena');
            $table->string('ubicacion');
            $table->string('costo');
            $table->string('horario');
            $table->string('telefono');
            $table->string('correo');
            $table->string('status');
            $table->string('clima');
            $table->string('estacionamiento');
            $table->string('sdomicilio');
            $table->foreing('cliente_publicidad');
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
        Schema::dropIfExists('publicidads');
    }
}
