@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12 col-md-8 materias">
           
            @for ($i = 0; $i < count($cuatris); $i++)

                @if(count($cuatris[$i])>0)

                    @if($i%2==0)
                        <div class="col-12 anio">
                            {{(($i/2)+1)}} año
                        </div>
                    @endif
                    
                    <div class="col-12 cuatri">
                        {{(($i%2)+1)}}  Cuatrimestre
                    </div>
            
                    @foreach ($cuatris[$i] as $materia)

                        <div class="col-12 materia row text-left">
                            <div class="col-1 codigo col d-none d-md-inline-block">{{$materia->codigo}}</div>                        
                            <div class="col-6 col-md-7 nombre col">
                                <span class="d-md-none">({{$materia->codigo}})</span>
                                {{$materia->nombre}}
                            </div>
                            
                            <div class="col-5 col-md-3 col">
                                <div class="rojo nota">
                                    est
                                </div>         
                                <div class="verde nota">
                                    est
                                </div>                                
                            </div>

                            <div class="col-1 col text-right">
                                <a class="pr-0 pr-md-2 icon" href="#">
                                    <i class="fas fa-angle-down"></i>
                                </a>
                                <a class="icon" href="#">
                                    <i class="fas fa-comment"></i>
                                </a>
                            </div>
                        
                        </div>
                    @endforeach   
                @endif         
            @endfor

        </div>

    </div>
@endsection