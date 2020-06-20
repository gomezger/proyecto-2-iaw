<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';
    protected $primaryKey = 'codigo';
    protected $fillable = [ 'codigo', 'nombre', 'profesor', 'profesor_imagen', 'cuatrimestre' ];


    public function correlativas(){
        return $this->hasMany('App\Models\Correlativa','materia','codigo');
    }


}
