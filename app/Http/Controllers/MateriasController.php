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

    /**
     * Agrega una cursada al usuario logueado
     *
     * @param Request $request recibe a traves de un form-data el codigo de la materia
     * @return view muestra la vista de las materias
     */
    public function agregarCursadaPost(Request $request){

        $validatedData = $this->validate($request, [
            "codigo" => 'integer|required|exists:materias'
        ]);  

        return $this->agregarCursada($request->input('codigo')); 
    }

    /**
     * Agrega una cursada al usuario logueado
     *
     * @param string $codigo recibe un parametro que es el codigo de la materia
     * @return view muestra la vista de las materias
     */
    public function agregarCursada(string $codigo){

        $user = new RepoUser(Auth::user()->email);

        if(!$user->curso($codigo))
            
            if($user->puedeCursar($codigo))
                RepoHistorial::insert($user->email, $codigo);
            else
                return redirect('/')->with("status-error","No cumple con las correlativas"); 

        else
            return redirect('/')->with("status-error","Ya cursó esta materia"); 


        return redirect('/')->with("status-success","Cursada agregada");   
    }
    

    /**
     * Elimina una cursada al usuario logueado
     *
     * @param string $codigo recibe un parametro que es el codigo de la materia
     * @return view muestra la vista de las materias
     */
    public function eliminarCursada(string $codigo){

        $user = new RepoUser(Auth::user()->email);

        //verifico si ya curso
        if($user->curso($codigo))
            RepoHistorial::delete($user->email, $codigo);

        
        return redirect()->route('materias');  
    }

    /**
     * Agrega un final al usuario logueado
     *
     * @param Request $request recibe a traves de un form-data el codigo de la materia y su nota
     * @return view muestra la vista de las materias
     */
    public function agregarFinalPost(Request $request){

        $validatedData = $this->validate($request, [
            "codigo" => 'integer|required|exists:materias',
            "nota" => 'integer|required|min:4|max:10'
        ]);  

        return $this->agregarFinal($request->input('codigo'),$request->input('nota')); 
    }

    /**
     * Agrega un cursada al usuario logueado
     *
     * @param string $codigo recibe un parametro que es el codigo de la materia
     * @param string $nota recibe un parametro que es la nota de la materia
     * @return view muestra la vista de las materias
     */
    public function agregarFinal(string $codigo, string $nota){
        $user = new RepoUser(Auth::user()->email);

        //verifico si puede rendir
        if($user->curso($codigo) && $user->puedeRendir($codigo)){
            RepoHistorial::update($user->email, $codigo, $nota);
            return redirect('/')->with("status-success","Final agregado");   
        }else
            return redirect('/')->with("status-error","No cumple con las correlativas"); 

    }
    
    /**
     * Elimina un final al usuario logueado
     *
     * @param string $codigo  recibe a traves de un form-data el codigo de la materia
     * @return view muestra la vista de las materias
     */
    public function eliminarFinal(string $codigo){

        $user = new RepoUser(Auth::user()->email);

        //verifico si puede rendir
        if($user->aprobo($codigo))
            RepoHistorial::update($user->email, $codigo, null);

        
        return redirect()->route('materias');   
    }
    

    /**
     * Vista de las materias, carga las materias por cuatrimestre y el usuario
     *
     * @return void muestra la vista de las materias
     */
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
