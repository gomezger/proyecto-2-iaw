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

    public function agregarCursadaPost(Request $request){

        $validatedData = $this->validate($request, [
            "codigo" => 'integer|required|exists:materias'
        ]);  

        return $this->agregarCursada($request->input('codigo')); 
    }

    public function agregarCursada($codigo){

        $user = new RepoUser(Auth::user()->email);

        //verifico si puede cursar
        if($user->puedeCursar($codigo))
            RepoHistorial::insert($user->email, $codigo);
        else
             return redirect('/')->with("status-error","No cumple con las correlativas"); 

        return redirect('/')->with("status-success","Cursada agregada");   
    }
    

    public function eliminarCursada($codigo){

        $user = new RepoUser(Auth::user()->email);

        //verifico si ya curso
        if($user->curso($codigo))
            RepoHistorial::delete($user->email, $codigo);

        
        return redirect()->route('materias');  
    }

    
    public function agregarFinalPost(Request $request){

        $validatedData = $this->validate($request, [
            "codigo" => 'integer|required|exists:materias',
            "nota" => 'integer|required|min:4|max:10'
        ]);  

        return $this->agregarFinal($request->input('codigo'),$request->input('nota')); 
    }

    public function agregarFinal($codigo, $nota){
        $user = new RepoUser(Auth::user()->email);

        //verifico si puede rendir
        if($user->curso($codigo) && $user->puedeRendir($codigo))
            RepoHistorial::update($user->email, $codigo, $nota);
        else
            return redirect('/')->with("status-error","No cumple con las correlativas"); 

       return redirect('/')->with("status-success","Final agregado");   
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
            "5" => "Quinto"
        ];
        
        $user = new RepoUser(Auth::user()->email);

        return view('materias/materias')->with([ 'cuatris' => $cuatris, 'aridad' => $aridad, 'user' => $user ]);
    }

}
