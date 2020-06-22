<?php

namespace App\Repositories;

use App\Models\Correlativa;

class RepoCorrelativa {

    

    public static function all(): array{
        return Correlativa::all()->load('materia','requerida');
    }


    public static function create(array  $data): Correlativa{
        return Correlativa::create($data);
    }

    
    public static function update(array $data, string $materia, $requerida): Correlativa{
        $correlativa = self::find($id);

        if(!is_null($correlativa))
            return $correlativa->update($data);

        return null;
    }


    public static function delete(string $id): Correlativa{
        $Correlativa = self::find($id);
        $Correlativa->delete();
        return $Correlativa;
    }


    public static function findById(string $id): Correlativa{
        return Correlativa::find($id)->load('correlativas');
    }

}