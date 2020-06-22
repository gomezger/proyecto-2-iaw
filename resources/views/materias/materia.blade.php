{{-- materia --}}
<div class="col-12 materia row text-left">

    <div class="col-1 codigo col d-none d-md-inline-block">
        {{$materia->codigo}}
    </div>    

    <div class="col-6 col-md-7 nombre col">
        <span class="d-md-none">({{$materia->codigo}})</span>
        <span>{{$materia->nombre}}</span>
    </div>
    
    <div class="col-5 col-md-3 col">

        @include('materias/botones/cursar', [ "user" => $user, "materia" => $materia ] )

        @include('materias/botones/final', [ "user" => $user, "materia" => $materia ] )
                            
    </div>

    <div class="col-1 col text-right">
        <a class="pr-0 pr-md-2 icon" data-toggle="collapse" href="#collapseCorrelativas-{{$materia->codigo}}" role="button"  aria-expanded="false" aria-controls="collapseCorrelativas-{{$materia->codigo}}">
            <i class="fas fa-angle-down"></i>
        </a>
        <a class="icon" href="#">
            <i class="fas fa-comment"></i>
        </a>
    </div>
    
</div>

{{-- CORRELATIVAS --}}
<div class="col-12 materia row text-left pr-0 collapse" id="collapseCorrelativas-{{$materia->codigo}}">
    @include('materias/correlativas', [ "materia" => $materia])
</div>
