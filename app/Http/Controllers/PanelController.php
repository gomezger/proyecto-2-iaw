<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RepoMateria;

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
            "profesor_foto" => 'required',
            "cuatrimestre" => 'integer|min:1|max:10',
        ]);

        RepoMateria::create(
            array(
                "codigo" => $request->input('codigo',null),
                "nombre" => $request->input('nombre',null),
                "profesor" => $request->input('profesor',null),
                "profesor_foto" => base64_encode($request->file('profesor_foto',null)),
                "cuatrimestre" => $request->input('cuatrimestre',null)
            )
        );

        $materias = RepoMateria::all();
        return redirect()->route('panel-materias',["materias"=>$materias]);
    }

    public function editarMateria(Request $request, $codigo){

        $validatedData = $this->validate($request, [
            "codigo" => 'integer|required',
            "nombre" => 'required|max:250',
            "profesor" => 'required|max:250',
            "profesor_foto" => '',
            "cuatrimestre" => 'integer|min:1|max:10',
        ]);

        RepoMateria::update(
            array(
                "codigo" => $request->input('codigo',null),
                "nombre" => $request->input('nombre',null),
                "profesor" => $request->input('profesor',null),
                "profesor_foto" => base64_encode($request->file('profesor_foto',null)),
                "cuatrimestre" => $request->input('cuatrimestre',null)
            ),
            $codigo
        );

        $materias = RepoMateria::all();
        return redirect()->route('panel-materias',["materias"=>$materias]);
    }



    public function deleteMateria($codigo){
        RepoMateria::delete($codigo);   
        $materias = RepoMateria::all();
        return redirect()->route('panel-materias',["materias"=>$materias]);
    }

}
