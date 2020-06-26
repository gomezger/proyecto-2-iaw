<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';
    protected $primaryKey = 'codigo';
    protected $fillable = [ 'codigo', 'nombre', 'profesor', 'profesor_imagen', 'cuatrimestre' ];


    public function correlativas_cursadas_cursadas(){
        return $this->hasMany('App\Models\Correlativa','materia','codigo')->where('tipo', 'cursada')->where('condicion','cursada');
    }
    public function correlativas_cursadas_aprobadas(){
        return $this->hasMany('App\Models\Correlativa','materia','codigo')->where('tipo', 'cursada')->where('condicion','aprobada');
    }
    public function correlativas_aprobadas_cursadas(){
        return $this->hasMany('App\Models\Correlativa','materia','codigo')->where('tipo', 'aprobada')->where('condicion','cursada');
    }
    public function correlativas_aprobadas_aprobadas(){
        return $this->hasMany('App\Models\Correlativa','materia','codigo')->where('tipo', 'aprobada')->where('condicion','aprobada');
    }
}
