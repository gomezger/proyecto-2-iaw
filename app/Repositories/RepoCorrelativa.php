<?php

namespace App\Repositories;

use App\Models\Correlativa;

class RepoCorrelativa {


    /**
     * Crea una correlativa
     *
     * @param array $data datos de la correlativa
     */
    public static function create(array  $data){
        return Correlativa::create($data);
    }

    /**
     * Busca una correlativa
     *
     * @param string $id
     * @return Correlativa
     */
    public static function findById(string $id): Correlativa{
        return Correlativa::find($id)->load('correlativas');
    }

}