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

    public static function findByCuatri(){
        $cuatris = array();

        for($i=0; $i<10; $i++){
            $cuatris[$i] = Materia::where('cuatrimestre','=',($i+1))->orderBy('cuatrimestre', 'ASC')->get(); 
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

    /**
     * Actualiza una materia si existe
     *
     * @param array $data datos necesiarios para actualizar la materia
     * @param string $id código de la materia
     * @return Materia Retorna la materia editada. Si no existe retorna null
     */
    public static function update(array $data, string $id): Materia{
        $materia = self::find($id);

        if(!is_null($materia))
            return $materia->update($data);

        return null;
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
        return Materia::find($id)->load('correlativas');
    }


}