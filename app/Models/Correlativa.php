<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Correlativa extends Model
{
    protected $table = 'correlativas';
    protected $fillable = [ 'materia', 'requerida', 'tipo', 'condicion'];


    public function materia(){
        return $this->belongsTo('App\Models\Materia', 'materia', 'codigo');
    }

    public function requerida(){
        return $this->belongsTo('App\Models\Materia', 'requerida', 'codigo');
    }

}
