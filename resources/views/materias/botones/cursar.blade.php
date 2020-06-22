
@if ($user->curso($materia->codigo))   
    
    <a class="azul nota" href="{{route('eliminar-cursada', ['codigo' => $materia->codigo ])}}">
        Cursada
    </a>

@else

    @if ($user->puedeCursar($materia->codigo))       
        <a class="verde nota" href="{{route('agregar-cursada', ['codigo' => $materia->codigo ])}}">
            Puede
        </a>   
    @else
        <div class="rojo nota">
            <i class="fas fa-times"></i>
        </div> 
    @endif 

@endif