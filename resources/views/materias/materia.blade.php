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
        <a class="icon" type="button" data-toggle="modal" data-target="#profesorModal-{{$materia->codigo}}" href="#">
            <i class="fas fa-user"></i>
        </a>
    </div>
    
</div>

{{-- CORRELATIVAS --}}
<div class="col-12 materia row text-left pr-0 collapse" id="collapseCorrelativas-{{$materia->codigo}}">
    @include('materias/correlativas', [ "materia" => $materia])
</div>


<!-- Modal -->
<div class="modal fade" id="profesorModal-{{$materia->codigo}}" tabindex="-1" role="dialog" aria-labelledby="profesorModal-{{$materia->codigo}}Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{$materia->nombre}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img class="col-12 p-0 mb-3" src="data:image/jpeg;base64,{{$materia->profesor_imagen}}">
            <h5>{{$materia->profesor}}</h5>   
        </div>
      </div>
    </div>
</div>
