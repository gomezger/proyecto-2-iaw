@extends('layouts.app')

@section('content')
    <div class="container">


        <h1 class="d-inline-block mr-3">
            Materias
        </h1>
        <button type="button" class="btn btn-primary d-inline-block mb-3" data-toggle="modal" data-target="#agregarMateriaModal">
            Agregar materia
        </button>

        @include('panel/agregar-materia')

        <div class="div-tabla table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Profesor</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Cuatri.</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($materias as $materia)
                        <tr>
                            <th scope="row">{{$materia->codigo}}</th>
                            <td>{{$materia->nombre}}</td>
                            <td>{{$materia->profesor}}</td>
                            <td>prox</td>
                            <td>{{$materia->cuatrimestre}}</td>
                            <td>
                                <a type="button" data-toggle="modal" data-target="#agregarCorrelativaModal-{{$materia->codigo}}" title="agregar correlativa" class="mr-2" href="#"><i class="fas fa-plus"></i></a>
                                <a type="button" data-toggle="modal" data-target="#correlativasMateriaModal-{{$materia->codigo}}" title="ver correlativas" class="mr-2" href="#"><i class="fab fa-cuttlefish"></i></a>
                                <a type="button" data-toggle="modal" data-target="#editarMateriaModal-{{$materia->codigo}}" title="editar materia" href="#" class="mr-2"><i class="far fa-edit"></i></a>
                                <a title="eliminar materia" href="{{route('eliminar-materia',$materia->codigo)}}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>

                        @include('panel/editar-materia',["materia"=>$materia])
                        @include('panel/correlativas',["materia"=>$materia])
                        @include('panel/agregar-correlativa',["materia"=>$materia, "materias" => $materias])
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>    




@endsection