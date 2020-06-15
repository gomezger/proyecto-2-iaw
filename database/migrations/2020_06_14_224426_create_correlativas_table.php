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
            $table->string('tipo'); // para cursasa o aprobado
            $table->string('condicion'); // si tiene que estar cursada o aprobada
            $table->timestamps();


            $table->foreign('materia')
            ->references('codigo')->on('materias')
            ->onDelete('restrict');	

            $table->foreign('tipo')
            ->references('nombre')->on('correlativas_estados')
            ->onDelete('restrict');	

            $table->foreign('condicion')
            ->references('nombre')->on('correlativas_estados')
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
