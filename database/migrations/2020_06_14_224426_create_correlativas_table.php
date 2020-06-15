<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrelativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correlativas', function (Blueprint $table) {
            $table->id();
            $table->string('materia');
            $table->string('requerida');
            $table->boolean('fuerte'); //si es falso solo, es blanda
            $table->boolean('final'); //si es falso solo, es de cursada
            $table->timestamps();


            $table->foreign('materia')
            ->references('codigo')->on('materias')
            ->onDelete('restrict');	

        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('correlativas');
    }
}
