<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepoMateria;
use App\Repositories\RepoCorrelativa;

class PanelController extends Controller
{
    public function __construct(){
        $this->middleware('auth-admin');
    }


    public function materias(){
        $materias = RepoMateria::all();
        return view('panel/materias',["materias"=>$materias]);
    }


    public function agregarMateria(Request $request){

        $validatedData = $this->validate($request, [
            "codigo" => 'integer|required|unique:materias',
            "nombre" => 'required|max:250|unique:materias',
            "profesor" => 'required|max:250',
            "profesor_foto" => 'required|mimes:jpeg,gif,png',
            "cuatrimestre" => 'integer|min:1|max:10',
        ]);        

        $imagen = $request->file('profesor_foto',null);
        if(!is_null($imagen)){
            $foto = base64_encode(file_get_contents($imagen->path()));
        }else{
            $foto = null;
        }

        RepoMateria::create(
            array(
                "codigo" => $request->input('codigo',null),
                "nombre" => $request->input('nombre',null),
                "profesor" => $request->input('profesor',null),
                "profesor_imagen" => $foto,
                "cuatrimestre" => $request->input('cuatrimestre',null)
            )
        );

        return $this->redirectMaterias();
    }

    public function editarMateria(Request $request, $codigo){

        $validatedData = $this->validate($request, [
            "codigo" => 'integer|required|exists:materias',
            "nombre" => 'required|max:250',
            "profesor" => 'required|max:250',
            "profesor_foto" => 'mimes:jpeg,gif,png',
            "cuatrimestre" => 'integer|min:1|max:10',
        ]);


        $imagen = $request->file('profesor_foto',null);
        if(!is_null($imagen)){
            $foto = base64_encode(file_get_contents($imagen->path()));
        }else{
            $foto = null;
        }


        RepoMateria::update(
            array(
                "codigo" => $request->input('codigo',null),
                "nombre" => $request->input('nombre',null),
                "profesor" => $request->input('profesor',null),
                "profesor_imagen" => $foto,
                "cuatrimestre" => $request->input('cuatrimestre',null)
            ),
            $codigo
        );

        return $this->redirectMaterias();
    }



    public function deleteMateria($codigo){
        RepoMateria::delete($codigo);   
        return $this->redirectMaterias();
    }


    

    public function agregarCorrelativa(Request $request){


        $validatedData = $this->validate($request, [
            "tipo" => 'required|max:255|exists:correlativas_estados,nombre',
            "condicion" => 'required|max:255|exists:correlativas_estados,nombre',
            "requiere" => 'required|integer|exists:materias,codigo',
            "materia" => 'required|integer|exists:materias,codigo'
        ]);

        $requerida = RepoMateria::find($request->input('requiere',null));

        RepoCorrelativa::create(
            array(
                "materia" => $request->input('materia',null),
                "requerida" => $requerida->codigo,
                "requerida_nombre" => $requerida->nombre,
                "tipo" => $request->input('tipo',null),
                "condicion" => $request->input('condicion',null),
            )
        );

        return $this->redirectMaterias();
    }


    private function redirectMaterias(){
        $materias = RepoMateria::all();
        return redirect()->route('panel-materias',["materias"=>$materias]);
    }

}
