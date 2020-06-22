

@if ($user->aprobo($materia->codigo))   
    
    <a class="azul nota" href="{{route('eliminar-final', ['codigo' => $materia->codigo ])}}">
        {{ $user->nota($materia->codigo) }}
    </a>

@else
    @if ($user->puedeRendir($materia->codigo))       
        <a type="button" data-toggle="modal" data-target="#NotaFinalModal-{{$materia->codigo}}" class="verde nota">
            Puede
        </a>   
    @else
        <div class="rojo nota">
            <i class="fas fa-times"></i>
        </div> 
    @endif  
@endif  


<!-- Modal -->
<div class="modal fade" id="NotaFinalModal-{{$materia->codigo}}" tabindex="-1" role="dialog" aria-labelledby="NotaFinalModal-{{$materia->codigo}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Agregar nota final</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-center">
            <h5 class="mt-2">En {{$materia->nombre}} saqué un:</h5>

            @for ($nota=4; $nota<=10; $nota++)
                <a href="{{route('agregar-final', ['codigo' => $materia->codigo, "nota" => $nota ])}}" class="nota-modal">{{$nota}}</a>
            @endfor
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>