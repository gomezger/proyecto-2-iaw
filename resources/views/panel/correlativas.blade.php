<!-- Modal -->
<div class="modal fade" id="correlativasMateriaModal-{{$materia->codigo}}" tabindex="-1" role="dialog" aria-labelledby="correlativasMateriaModal-{{$materia->codigo}}Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">{{$materia->nombre}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="correlativas col-12">

                    <h5 class="titulo mb-2">Para cursar</h5>
                    
                    <div class="row ">
                        <div class="col-12">
                            @if(count($materia->correlativas_cursadas_cursadas)==0 && count($materia->correlativas_cursadas_aprobadas)==0)
                                <div class="col-12">No hay materias requeridas</div>
                            @else
                                @foreach ($materia->correlativas_cursadas_cursadas as $correlativa)   
                                    <div class="row mb-2">
                                        <div class="col-3">{{$correlativa->requerida}}</div>
                                        <div class="col-6">{{$correlativa->requerida_nombre}}</div>
                                        <div class="col-3">{{$correlativa->condicion}}</div>
                                    </div>
                                @endforeach
                                @foreach ($materia->correlativas_cursadas_aprobadas as $correlativa)   
                                    <div class="row mb-2">
                                        <div class="col-3">{{$correlativa->requerida}}</div>
                                        <div class="col-6">{{$correlativa->requerida_nombre}}</div>
                                        <div class="col-3">{{$correlativa->condicion}}</div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div> 
            
                    <h5 class="titulo mt-3 mb-2">Para rendir final</h5>
                    
                    <div class="row ">
                        <div class="col-12">
                            @if(count($materia->correlativas_cursadas_cursadas)==0 && count($materia->correlativas_cursadas_aprobadas)==0)
                                <div class="col-12">No hay materias requeridas</div>    
                            @else
                                @foreach ($materia->correlativas_aprobadas_aprobadas as $correlativa)   
                                    <div class="row mb-2">
                                        <div class="col-3">{{$correlativa->requerida}}</div>
                                        <div class="col-6">{{$correlativa->requerida_nombre}}</div>
                                        <div class="col-3">{{$correlativa->condicion}}</div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div> 
            
                </div> 
            </div>
        </div>
    </div>
</div>