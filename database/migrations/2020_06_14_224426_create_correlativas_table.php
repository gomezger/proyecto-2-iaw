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
            $table->integer('materia')->unsigned()->nullable();
            $table->integer('requerida')->unsigned()->nullable();
            $table->string('requerida_nombre')->nullable();
            $table->string('tipo'); // para cursasa o aprobado
            $table->string('condicion'); // si tiene que estar cursada o aprobada
            $table->timestamps();


            $table->foreign('materia')
                ->references('codigo')->on('materias')
                ->onDelete('cascade')		  
                ->onUpdate('cascade');	

            $table->foreign('requerida')
                ->references('codigo')->on('materias')
                ->onDelete('cascade')		  
                ->onUpdate('cascade');

            $table->foreign('requerida_nombre')
                ->references('nombre')->on('materias')
                ->onDelete('cascade')		  
                ->onUpdate('cascade');

            $table->foreign('tipo')
                ->references('nombre')->on('correlativas_estados')
                ->onDelete('cascade')		  
                ->onUpdate('cascade');	

            $table->foreign('condicion')
                ->references('nombre')->on('correlativas_estados')
                ->onDelete('cascade')		  
                ->onUpdate('cascade');	

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
