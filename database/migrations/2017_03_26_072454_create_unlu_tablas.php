<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnluTablas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('unlu_carreras', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre_carrera');
          $table->timestamps();
      });

      Schema::create('unlu_estudiantes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('legajo')->unsigned();
          $table->integer('unlu_carrera_id')->unsigned();
          $table->foreign('unlu_carrera_id')->references('id')->on('unlu_carreras');
          $table->string('nombre_estudiante');
          $table->string('apellido_estudiante');
          $table->date('fecha_nacimiento_estudiante');
          $table->string('cuil')->unique();
          $table->string('tipo_documento');
          $table->string('nro_documento')->unique();
          $table->string('email_estudiante')->unique();
          $table->string('telefono_fijo');
          $table->string('telefono_celular');
          $table->string('domicilio');
          $table->string('localidad');
          $table->string('provincia');
          $table->string('pais');
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

        Schema::drop('unlu_carreras');
        Schema::drop('unlu_estudiantes');

    }
}
