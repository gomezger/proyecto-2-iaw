<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historial';
    protected $fillable = [ 'id', 'alumno', 'materia', 'final'];


    public function alumno(){
        return $this->belongsTo('App\Models\User', 'alumno', 'email');
    }
    
    public function materia(){
        return $this->belongsTo('App\Models\Materia', 'materia', 'codigo');
    }
}
