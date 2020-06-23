<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {  

            $table->integer('codigo')->unsigned()->nullable();
            $table->string('nombre')->unique();
            $table->string('profesor');            
            $table->text('profesor_imagen')->nullable();
            $table->integer('cuatrimestre');
            
            $table->primary('codigo');

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
        Schema::dropIfExists('materias');
    }
}
