<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\RepoUser;
use App\Repositories\RepoHistorial;

class ApiController extends Controller
{
    public function cursadas(){     
        $user = new RepoUser(Auth::user()->email);

        $data = array(
            "status" => "success",
            "cursadas" => $user->cursadas()
        );

        return response()->json($data,200);
    }

    public function aprobadas(){     
        $user = new RepoUser(Auth::user()->email);

        $data = array(
            "status" => "success",
            "aprobadas" => $user->aprobadas()
        );

        return response()->json($data,200);
    }

    
    public function ACursar(){     
        $user = new RepoUser(Auth::user()->email);

        $data = array(
            "status" => "success",
            "materias" => $user->materiasACursar()
        );

        return response()->json($data,200);
    }
    
    public function ARendir(){     
        $user = new RepoUser(Auth::user()->email);

        $data = array(
            "status" => "success",
            "materias" => $user->materiasARendir()
        );

        return response()->json($data,200);
    }

    public function promedioAlumno(){     
        $user = new RepoUser(Auth::user()->email);

        $data = array(
            "status" => "success",
            "promedio" => $user->promedio()
        );

        return response()->json($data,200);
    }

    public function promedioMaterias(){           

        $data = array(
            "status" => "success",
            "promedios" => RepoHistorial::promedios()
        );

        return response()->json($data,200);
    }

    public function cantidadAlumnos(){           

        $data = array(
            "status" => "success",
            "promedios" => RepoHistorial::alumnos()
        );

        return response()->json($data,200);
    }
}
