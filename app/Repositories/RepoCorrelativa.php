<?php

namespace App\Repositories;

use App\Models\Correlativa;

class RepoCorrelativa {

    /**
     * Retorna todas las correlativas con sus respectivas Correlativas
     *
     * @return array arreglo de correlativas
     */
    public static function all(): array{
        return Correlativa::all()->load('materia','requerida');
    }

    /**
     * Crea una correlativa con los datos recibidos en $data
     *
     * @param array $data datos necesiarios para crear la correlativa
     * @return Correlativa retorna la correlativa creada
     */
    public static function create(array  $data): Correlativa{
        return Correlativa::create($data);
    }

    
    public static function update(array $data, string $materia, $requerida): Correlativa{
        $Correlativa = self::find($id);

        if(!is_null($Correlativa))
            return $Correlativa->update($data);

        return null;
    }

    /**
     * Elimina una Correlativa
     *
     * @param string $id codigo de la Correlativa
     * @return Correlativa retorna la Correlativa eiminada
     */
    public static function delete(string $id): Correlativa{
        $Correlativa = self::find($id);
        $Correlativa->delete();
        return $Correlativa;
    }

    /**
     * Retorna la Correlativa con codigo $id
     *
     * @param string $id codigo de la Correlativa
     * @return Correlativa Correlativa con codigo $id
     */
    public static function findById(string $id): Correlativa{
        return Correlativa::find($id)->load('correlativas');
    }
/* 
    public static function find(string $materia, string $requerida): Correlativa */

}