<?php

use Illuminate\Database\Seeder;

class CorrelativasEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->add('cursada');
        $this->add('aprobada');
    }


    public function add(string $nombre): void {
        DB::table('correlativas_estados')->insert([
            'nombre' => $nombre,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
