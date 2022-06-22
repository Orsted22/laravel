<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('documento');
            $table->string('tipoDocumento');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('direccion');
            $table->bigInteger('telefono');
            $table->string('genero');
            $table->date('fechaNacimiento');
            $table->string('estadoCivil');
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
        Schema::dropIfExists('pacientes');
    }
}
