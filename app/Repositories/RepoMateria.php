<?php

namespace App\Repositories;

use App\Models\Materia;

class RepoMateria {

    /**
     * Retorna todas las materias con sus respectivas correlativas
     *
     * @return array arreglo de materias
     */
    public static function all(){
        return Materia::orderBy('cuatrimestre', 'ASC')->get(); //->load('correlativas');
    }


    /**
     * Retorna un arreglo de arreglos. Cada sub arreglo tiene las materias de un cuatrimestre. El indice del subarrreglo coincide cn su cuatrimestre 
     *
     * @return array arreglo de arreglo que tiene materias
     */
    public static function findByCuatri(): array{
        $cuatris = array();

        for($i=0; $i<10; $i++){
            $cuatris[$i] = Materia::where('cuatrimestre','=',($i+1))
                                    ->orderBy('cuatrimestre', 'ASC')
                                    ->get()
                                    ->load('correlativas_cursadas_cursadas')
                                    ->load('correlativas_cursadas_aprobadas')
                                    ->load('correlativas_aprobadas_aprobadas'); 
        }
        return $cuatris;
    }


    /**
     * Crea una materia con los datos recibidos en $data
     *
     * @param array $data datos necesiarios para crear la materia
     * @return Materia retorna la materia creada
     */
    public static function create(array  $data): Materia{
        return Materia::create($data);
    }


    public static function update(array $data, string $id): bool{
        $materia = self::find($id);

        if(is_null($data['profesor_imagen'])) {
            unset($data['profesor_imagen']);
        }

        if(!is_null($materia))
            return $materia->update($data);

        return false;
    }

    /**
     * Elimina una materia
     *
     * @param string $id codigo de la materia
     * @return Materia retorna la materia eiminada
     */
    public static function delete(string $id): Materia{
        $materia = self::find($id);
        $materia->delete();
        return $materia;
    }

    /**
     * Retorna la materia con codigo $id
     *
     * @param string $id codigo de la materia
     * @return Materia materia con codigo $id
     */
    public static function find(string $id): Materia{
        return Materia::find($id)->load('correlativas_cursadas_cursadas','correlativas_cursadas_aprobadas','correlativas_aprobadas_aprobadas','correlativas_aprobadas_cursadas');
    }


}