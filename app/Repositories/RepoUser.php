<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Materia;
use App\Repositories\RepoHistorial;
use App\Repositories\RepoMaterial;

class RepoUser {
    public $email;

    public function __construct($email){
        $this->email = $email;
    }

    public function puedeCursar($codigo){
        $materia = RepoMateria::find($codigo);
        

        if($materia!=[]){        
            if(!$this->tieneCursadas($materia->correlativas_cursadas_cursadas))   
                return false;      
            if(!$this->tieneFinales($materia->correlativas_cursadas_aprobadas))   
                return false;                        
        }

        return true;

    }
    
    public function puedeRendir($codigo){
        $materia = RepoMateria::find($codigo);

        //verifico cursada
        if(!RepoHistorial::curso($this->email, $codigo))
            return false;

        if($materia!=[]){        
            if(!$this->tieneFinales($materia->correlativas_aprobadas_aprobadas))   
                return false;                      
        }

        return true;

    }

    private function tieneCursadas($correlativas){        
        foreach ( $correlativas as $correlativa ) {
            if(!RepoHistorial::curso($this->email, $correlativa->requerida))
                return false;
        }
        return true;
    }

    private function tieneFinales($correlativas){        
        foreach ( $correlativas as $correlativa ) {
            if(!RepoHistorial::aprobo($this->email, $correlativa->requerida))
                return false;
        }
        return true;
    }

    public function curso($codigo){
        return RepoHistorial::curso($this->email, $codigo);
    }

    public function aprobo($codigo){
        return RepoHistorial::aprobo($this->email, $codigo);
    }

    public function nota($codigo){
        return RepoHistorial::findFinal($this->email, $codigo)->final;
    }

    public function cursadas(){
        $cursadas = array();
        $materias = RepoMateria::all();

        foreach($materias as $m)
            if($this->curso($m->codigo)){
                $hist = RepoHistorial::find($this->email, $m->codigo)->load('materia');
                array_push($cursadas,$hist);
            }
        return $cursadas;
    }
    public function aprobadas(){
        $aprobadas = array();
        $materias = RepoMateria::all();

        foreach($materias as $m)
            if($this->aprobo($m->codigo)){
                $hist = RepoHistorial::find($this->email, $m->codigo)->load('materia');
                array_push($aprobadas,$hist);
            }
        return $aprobadas;
    }
}
