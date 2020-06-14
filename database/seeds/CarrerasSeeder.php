<?php

use Illuminate\Database\Seeder;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->agregarCarrera('50','Licenciatura en Cs. de la Computación', 10);
        $this->agregarCarrera('180','Ingenieria en Sistemas de Información', 10);
    }

    private function agregarCarrera(int $codigo, string $nombre, int $duracion): void{
        DB::table('carreras')->insert([
            'codigo' => $codigo,
            'nombre' => $nombre,
            'duracion' => $duracion,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
