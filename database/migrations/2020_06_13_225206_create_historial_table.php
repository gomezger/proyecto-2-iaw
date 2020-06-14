<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {

            $table->id();
            $table->string('alumno');
            $table->string('materia');
            $table->float('final')->nullable();
            
			
            $table->foreign('materia')
			  ->references('codigo')->on('materias')
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
        Schema::dropIfExists('historial');
    }
}
