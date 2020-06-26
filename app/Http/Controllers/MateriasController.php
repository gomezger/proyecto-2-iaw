<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepoMateria;
use App\Repositories\RepoHistorial;
use App\Repositories\RepoUser;
use Illuminate\Support\Facades\Auth;


class MateriasController extends Controller
{

    private $cuatris, $aridad, $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        return $this->vistaMaterias();
    }


    public function agregarCursada($codigo){

        $user = new RepoUser(Auth::user()->email);

        //verifico si puede cursar
        if($user->puedeCursar($codigo))
            RepoHistorial::insert($user->email, $codigo);

        
        return redirect()->route('materias');   
    }
    

    public function eliminarCursada($codigo){

        $user = new RepoUser(Auth::user()->email);

        //verifico si ya curso
        if($user->curso($codigo))
            RepoHistorial::delete($user->email, $codigo);

        
        return redirect()->route('materias');  
    }

    public function agregarFinal($codigo, $nota){
        $user = new RepoUser(Auth::user()->email);

        //verifico si puede rendir
        if($user->curso($codigo) && $user->puedeRendir($codigo))
            RepoHistorial::update($user->email, $codigo, $nota);
        
        return redirect()->route('materias');   
    }
    
    public function eliminarFinal($codigo){

        $user = new RepoUser(Auth::user()->email);

        //verifico si puede rendir
        if($user->aprobo($codigo))
            RepoHistorial::update($user->email, $codigo, null);

        
        return redirect()->route('materias');   
    }
    


    private function vistaMaterias(){
        
        $cuatris = RepoMateria::findByCuatri();

        $aridad = [
            "1" => "Primer",
            "2" => "Segundo",
            "3" => "Tercer",
            "4" => "Cuarto",
            "5" => "Quitno"
        ];
        
        $user = new RepoUser(Auth::user()->email);

        return view('materias/materias')->with([ 'cuatris' => $cuatris, 'aridad' => $aridad, 'user' => $user ]);
    }

}
