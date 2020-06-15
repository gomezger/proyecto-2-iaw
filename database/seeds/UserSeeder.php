<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->agregarUsuariosRandom(50);
        
        $this->agregarUsuario('Adrian', 'germang08@hotmail.com', Hash::make('1234'), 'alumno');

        $this->agregarUsuario('Germán Gómez', 'germang04@gmail.com', Hash::make('1234'), 'admin');
        
    }

    private function agregarUsuariosRandom(int $cantidad): void{
        //agrego 50 usuarios
        for($i=0; $i<$cantidad; $i++)
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password1234'),
                'status' => 'alumno',
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }

    private function agregarUsuario(string $nombre, string $email, string $password, string $status): void{
        DB::table('users')->insert([
            'name' => $nombre,
            'email' => $email,
            'password' => $password,
            'status' => $status,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }


}
