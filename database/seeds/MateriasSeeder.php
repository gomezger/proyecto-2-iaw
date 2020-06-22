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
        $this->agregarMateria(5912,'Elementos de Algebra y Geometría', 1);
        $this->agregarMateria(5793,'Resolución de problemas y algoritmos', 1);
        $this->agregarMateria(5551,'Análisis Matemático I', 2);
        $this->agregarMateria(7713,'Introducción a la Programación Orientada a Objetos', 2);
        $this->agregarMateria(7791,'Lenguajes Formales y Autómatas ', 2);


        # Segundo año
        $this->agregarMateria(7655,'Estructuras de Datos', 3);
        $this->agregarMateria(7949,'Teoria de la Computabilidad', 3);
        $this->agregarMateria(5552,'Análisis Matemático II', 4);
        $this->agregarMateria(5744,'Organización de computadoras', 4);
        $this->agregarMateria(7951,'Tecnología de Programación', 4);

        # Tercer año
        $this->agregarMateria(5534,'Análisis y diseño de sistemas ', 5);
        $this->agregarMateria(5561,'Arquitectura de computadoras', 5);
        $this->agregarMateria(5704,'Lógica para Ciencias de la Computación', 5);
        $this->agregarMateria(7552,'Bases de Datos', 6);
        $this->agregarMateria(7810,'Métodos de Computación Científica', 6);
        $this->agregarMateria(7820,'Modelos Estadísticos para Cs. de la Computación', 6);
        $this->agregarMateria(7925,'Sistemas Operativos y Distribuidos', 6);

        # Cuarto año
        $this->agregarMateria(5587,'Diseño y desarrollo de software ', 7);
        $this->agregarMateria(5696,'Lenguajes de Programación', 7);
        $this->agregarMateria(7903,'Redes de Computadoras', 7);
        $this->agregarMateria(7502,'Administración de Proyectos de Software', 8);
        $this->agregarMateria(5576,'Compiladores e Intérpretes', 8);
        $this->agregarMateria(5684,'Inteligencia Artificial ', 8);

        # Quinto año
        $this->agregarMateria(5523,'Algoritmos y complejidad  ', 9);
        $this->agregarMateria(7680,'Ingeniería de Aplicaciones Web', 9);

    }

    private function agregarMateria(string $codigo, string $nombre, int $cuatri): void{
        DB::table('materias')->insert([
            'codigo' => $codigo,
            'nombre' => $nombre,
            'profesor' => Str::random(5).' '.Str::random(10), 
            'cuatrimestre' => $cuatri,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
