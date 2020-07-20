<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Materia;
use App\Repositories\RepoHistorial;
use App\Repositories\RepoMateria;

class RepoUser {
    public $email;

    public function __construct($email){
        $this->email = $email;
    }


    /**
     * Verifica si el usuario cumple con las correlativas
     *
     * @param string $codigo codigo de la materia
     * @return boolean retorna true si puede cursar, falso caso contrario
     */
    public function puedeCursar(string $codigo): bool{
        $materia = RepoMateria::find($codigo);        

        if($materia!=[]){        
            if(!$this->tieneCursadas($materia->correlativas_cursadas_cursadas))   
                return false;      
            if(!$this->tieneFinales($materia->correlativas_cursadas_aprobadas))   
                return false;                        
        }
        return true;
    }
    
    /**
     * Verifica si tiene las correaltivas apra rendir un final
     *
     * @param string $codigo codigo de la materia
     * @return boolean true si puede rendir, falso caso contrario
     */
    public function puedeRendir(string $codigo): bool{
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

    /**
     * Veririca que materias puede cursar un alumno
     *
     * @return array retorna un array con el nombre de las materias
     */
    public function materiasACursar(): array{
        $a_cursar = array();
        $materias = RepoMateria::all();  

        foreach($materias as $materia){
            if(!$this->curso($materia->codigo) && $this->puedeCursar($materia->codigo)){
                array_push($a_cursar, $materia);
            }
        }

        return $a_cursar;
    }

    /**
     * Veririca que materias puede rendir un alumno
     *
     * @return array retorna un array con el nombre de las materias
     */
    public function materiasARendir(): array{
        $a_rendir = array();
        $materias = RepoMateria::all();  

        foreach($materias as $materia){
            if(!$this->aprobo($materia->codigo) && $this->puedeRendir($materia->codigo)){
                array_push($a_rendir, $materia);
            }
        }

        return $a_rendir;
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

    /**
     * Verifica el estado cursado de una materia
     *
     * @param string $codigo codigo de la materia
     * @return boolean true si curso, falso si no
     */
    public function curso(string $codigo): bool{
        return RepoHistorial::curso($this->email, $codigo);
    }

    /**
     * Verifica el estado aprobado  de una materia
     *
     * @param string $codigo codigo de la materia
     * @return boolean true si aprobo, falso si no
     */
    public function aprobo(string $codigo): bool{
        return RepoHistorial::aprobo($this->email, $codigo);
    }

    /**
     * Nota final de una materia
     *
     * @param string $codigo codigo de la materia
     * @return float nota final de la materia
     */
    public function nota(string $codigo): float{
        return RepoHistorial::findFinal($this->email, $codigo)->final;
    }

    /**
     * Materias cursadas por un usuario
     */
    public function cursadas(): array{
        $cursadas = array();
        $materias = RepoMateria::all();

        foreach($materias as $m)
            if($this->curso($m->codigo)){
                $hist = RepoHistorial::find($this->email, $m->codigo)->load('materia');
                array_push($cursadas,$hist);
            }
        return $cursadas;
    }


    /**
     * Materias aprobadas por un usuario
     */

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

    /**
     * promedio del alumno
     *
     * @return float nota promedio de una alumno
     */
    public function promedio(): float{
        $prom = RepoHistorial::allFinalesByAlumno($this->email)->avg('final');
        if(!is_null($prom))
            return $prom;
        else
            return 0;
    }
}
