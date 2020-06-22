<?php

use Illuminate\Database\Seeder;
use App\Repositories\RepoMateria;

class CorrelativasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #primer año
        $this->agregar(7713,[5793,5912],[],[],[5793,5912]); # ipoo
        $this->agregar(7791,[5793,5912],[],[],[5793,5912]); # lenguajes formales

        #segundo        
        $this->agregar(7655,[5551,7713],[5793],[],[5551,7713,5793]); # ED
        $this->agregar(7949,[7713,7791],[5912],[],[7713,7791,5912]); # tdp
        $this->agregar(5552,[],[5551],[],[5551]); # am2
        $this->agregar(5744,[7791,7655],[7713],[],[7791,7655,7713]); # orga
        $this->agregar(7951,[7655],[7713],[],[7655,7713]); # tdp

        #tercero
        $this->agregar(5534,[7951],[7655],[],[7951,7655]); # ayds
        $this->agregar(5561,[5744],[7791],[],[5744,7791]); # arqui
        $this->agregar(5704,[7951],[7949],[],[7951,7951]); # logica
        $this->agregar(7552,[5704,5534],[],[],[5704,5534]); # bases de datos
        $this->agregar(7810,[5552],[7791,7655],[],[5552,7791,7655]); # mcc
        $this->agregar(7820,[7791],[5551,5793],[],[7791,5551,5793]); # estadsitica
        $this->agregar(7925,[5561],[5744],[],[5561,5744]); # soyd

        #cuarto
        $this->agregar(5587,[7552],[5534],[],[7552,5534]); # dyds
        $this->agregar(5696,[7925,7552],[5704],[],[7925,7552,5704]); # lenguajes de prog
        $this->agregar(7903,[7925],[],[],[7925]); #redes
        $this->agregar(7502,[5587],[],[],[5587]); # aps
        $this->agregar(5576,[5696],[],[],[5696]); # compiladores
        $this->agregar(5684,[7552],[5704],[],[7552,5704]); # IA

        #quinto
        $this->agregar(5523,[5704,7810],[7951],[],[5704,7810,7951]); # algoritmos
        $this->agregar(7680,[5587,7903],[7552],[],[5587,7903,7552]); # iaw

    }



    private function agregar(string $materia, Array $cc, Array $ca, Array $ac, Array $aa): void{

        foreach($cc as $requerida)
            $this->agregarCorrelativa($materia, $requerida, 'cursada', 'cursada');
        foreach($ca as $requerida)
            $this->agregarCorrelativa($materia, $requerida, 'cursada', 'aprobada');
        foreach($ac as $requerida)
            $this->agregarCorrelativa($materia, $requerida, 'aprobada', 'cursada');
        foreach($aa as $requerida)
            $this->agregarCorrelativa($materia, $requerida, 'aprobada', 'aprobada');

    }    

    private function agregarCorrelativa(string $materia, string $requerida, string $tipo, string $condicion): void {

        $materia_aux = RepoMateria::find($requerida);

        DB::table('correlativas')->insert([
            'materia' => $materia,
            'requerida' => $requerida,
            'requerida_nombre' => $materia_aux->nombre,
            'tipo' => $tipo,
            'condicion' => $condicion,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}