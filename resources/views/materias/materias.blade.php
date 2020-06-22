@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12 col-md-8 materias">
           
            {{-- Recorro los cuatrimestre de la carrera --}}
            @for ($i = 0; $i < count($cuatris); $i++)

                {{-- Imprimo los datos del cuatri, si es que tiene materia --}}
                @if(count($cuatris[$i])>0)

                    {{-- Imprimo el año de la materia si "estamos en el primer cuatri" --}}
                    @if($i%2==0)
                        <div class="col-12 anio">
                            {{  $aridad[(($i/2)+1)]  }} año
                        </div>
                    @endif
                    
                    {{-- imprimo el cuatrimestre --}}
                    <div class="col-12 cuatri">
                        {{ $aridad[(($i%2)+1)] }}  Cuatrimestre
                    </div>
            
                    {{-- imprimo los datos de la materia --}}
                    @foreach ($cuatris[$i] as $materia)
                        @include('materias.materia', [ "materia" => $materia, "user" => $user ])
                    @endforeach   

                @endif 
                        
            @endfor

        </div>

    </div>
@endsection