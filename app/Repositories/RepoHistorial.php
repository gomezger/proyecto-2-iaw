<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Materia;
use App\Models\Historial;

class RepoHistorial {


    public static function curso($email, $codigo){
        $historial = self::findCursada($email,$codigo);

        if(is_null($historial))
            return false;
        else
            return true;            
    }


    public static function aprobo($email, $codigo){
        $historial = self::findFinal($email,$codigo);

        if(is_null($historial))
            return false;
        else
            return true;            
    }

    public static function insert($email, $materia){
        Historial::insert([
            "alumno" => $email,
            "materia" => $materia
        ]);
    }

    public static function update($email, $materia, $nota){
        $historial = self::find($email, $materia);
        $historial->final = $nota;
        $historial->save();
    }

    public static function delete($email, $materia){
        $materia = self::find($email, $materia);

        if(!is_null($materia))
            print_r($materia->delete());
    }


    public static function findCursada($email, $codigo){
        return Historial::where('alumno',$email)->where('materia',$codigo)->first();
    }

    public static function findFinal($email, $codigo){
        return Historial::where('alumno',$email)->where('materia',$codigo)->whereNotNull('final')->first();
    }

    public static function find($email, $codigo){        
        return Historial::where('alumno',$email)->where('materia',$codigo)->first();
    }



}