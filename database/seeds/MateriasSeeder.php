<?php

use Illuminate\Database\Seeder;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # Primer año
        $this->agregarMateria(5912,'Elementos de Algebra y Geometría', [[50,1],[180,1]]);
        $this->agregarMateria(5793,'Resolución de problemas y algoritmos', [[50,1],[180,1]]);
        $this->agregarMateria(5551,'Análisis Matemático I', [[50,1],[180,1]]);
        $this->agregarMateria(7713,'Introducción a la Programación Orientada a Objetos', [[50,1],[180,1]]);
        $this->agregarMateria(7791,'Lenguajes Formales y Autómatas ', [[50,1],[180,1]]);
        $this->agregarMateria(7714,'Introducción a la Ingeniería de Software ', [[180,1]]);



        $this->agregarMateria(5551,'Análisis Matemático I', [[50,1],[180,1]]);
        $this->agregarMateria(5551,'Análisis Matemático I', [[50,1],[180,1]]);
        $this->agregarMateria(5551,'Análisis Matemático I', [[50,1],[180,1]]);
        $this->agregarMateria(5551,'Análisis Matemático I', [[50,1],[180,1]]);
        $this->agregarMateria(5551,'Análisis Matemático I', [[50,1],[180,1]]);
        $this->agregarMateria(5551,'Análisis Matemático I', [[50,1],[180,1]]);
    }

    private function agregarMateria(int $codigo, string $nombre, Array $carreras): void{
        DB::table('materias')->insert([
            'codigo' => $codigo,
            'nombre' => $nombre,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        foreach($carreras as $carrera)
            DB::table('materia_carrera')->insert([
                'carrera' => $carrera[0],
                'materia' => $codigo,
                'anio' => $codigo[1],
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
