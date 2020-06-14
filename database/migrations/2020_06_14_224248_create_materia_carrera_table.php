<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaCarreraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_carrera', function (Blueprint $table) {
            $table->id();
            $table->string('materia');
            $table->string('carrera');
            $table->integer('anio');
			
            $table->foreign('materia')
			  ->references('codigo')->on('materias')
			  ->onDelete('restrict');			  

            $table->foreign('carrera')
            ->references('codigo')->on('carreras')
            ->onDelete('restrict');			  

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
        Schema::dropIfExists('materia_carrera');
    }
}
