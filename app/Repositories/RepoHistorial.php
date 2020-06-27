<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Materia;
use App\Models\Historial;
use App\Repositories\RepoMateria;

class RepoHistorial {

    /**
     * Verifica si un usuario curso una materia
     *
     * @param string $email email del alumnno
     * @param string $codigo codigo de la materia
     * @return boolean true si curso, falso caso contrario
     */
    public static function curso(string $email, string $codigo): bool{
        $historial = self::findCursada($email,$codigo);

        if(is_null($historial))
            return false;
        else
            return true;            
    }

    /**
     * Verifica si un usuario rindio un final
     *
     * @param string $email email del alumnno
     * @param string $codigo codigo de la materia
     * @return boolean true si aprobo, falso caso contrario
     */
    public static function aprobo(string $email, string $codigo): bool{
        $historial = self::findFinal($email,$codigo);

        if(is_null($historial))
            return false;
        else
            return true;            
    }

    /**
     * Agrega una cursada al hsitorial
     *
     * @param string $email email del alumnno
     * @param string $codigo codigo de la materia
     * @return boolean true si se creo, falso caso contrario
     */
    public static function insert(string $email, string $materia): bool{
        return Historial::insert([
            "alumno" => $email,
            "materia" => $materia
        ]);
    }

    /**
     * Edita el esatdo de una materia para un alumno (sirve para agregar la nota final)
     *
     * @param string $email email del alumnno
     * @param string $codigo codigo de la materia
     * @param integer $nota nota del final, si es nulo, se borra la bota
     * @return boolean true si acutalizo, falso caso contrario
     */
    public static function update(string $email, string $materia, $nota): bool{
        $historial = self::find($email, $materia);
        $historial->final = $nota;
        return $historial->save();
    }


    /**
     * Elimina del historial de un alumno, una de sus materias
     *
     * @param string $email email del alumnno
     * @param string $codigo codigo de la materia
     * @return boolean true si eilimino, flaso si no
     */
    public static function delete(string $email, string $materia): bool{
        $materia = self::find($email, $materia);

        if(!is_null($materia))
            return $materia->delete();

        return false;
    }

    /**
     * Calcula el promedio historico de todas las materias
     *
     * @return array arreglo con tuplas ["materia","promedio"]
     */
    public static function promedios(): array{
        $promedios = array();
        foreach(RepoMateria::all() as $materia){
            array_push(
                $promedios,
                array(
                    "materia" => $materia->nombre,
                    "promedio" => RepoMateria::promedio($materia->codigo)
                )
            );
        }
        return $promedios;
    }   


    /**
     * Retorna el estado de una materia  cursada de un alumno
     *
     * @param string $email email del alumnno
     * @param string $codigo codigo de la materia
     */
    public static function findCursada(string $email, string $codigo){
        return Historial::where('alumno',$email)->where('materia',$codigo)->first();
    }

    /**
     * Retorna el estado de una materia aprobada de un alumno
     *
     * @param string $email email del alumnno
     * @param string $codigo codigo de la materia
     */
    public static function findFinal(string $email, string $codigo){
        return Historial::where('alumno',$email)->where('materia',$codigo)->whereNotNull('final')->first();
    }

    /**
     * Retorna el estado de una materia de un alumno
     *
     * @param string $email email del alumnno
     * @param string $codigo codigo de la materia
     */
    public static function find(string $email, string $codigo){        
        return Historial::where('alumno',$email)->where('materia',$codigo)->first();
    }

    /**
     * Retorna todos los finales rendidos por un alumno
     *
     * @param string $email email del alumnno
     */
    public static function allFinalesByAlumno(string $email){
        return Historial::where('alumno',$email)->whereNotNull('final');
    }

    /**
     * Retorna todos los finales rendidos en una materia
     *
     * @param string $email email del alumnno
     */
    public static function allFinalesByMateria($codigo){
        return Historial::where('materia',$codigo)->whereNotNull('final');
    }

    



}