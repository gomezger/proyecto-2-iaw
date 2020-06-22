<!-- Modal -->
<div class="modal fade" id="agregarCorrelativaModal-{{$materia->codigo}}" tabindex="-1" role="dialog" aria-labelledby="agregarCorrelativaModal-{{$materia->codigo}}Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cargar correlativa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="POST" action="{{route('editar-materia',$materia->codigo)}}" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    @if($errors->any() && old('codigo')==$materia->codigo)

                        <script>    
                            document.addEventListener("DOMContentLoaded", function(event) {
                                $('#agregarCorrelativaModal-{{$materia->codigo}}').modal('toggle');
                            });                                    
                        </script>


                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ( $errors->all() as $error )
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputMateria">Tipo</label>
                            <select name="tipo" class="custom-select" id="inlineFormCustomSelectPref" required>

                                <option selected>Elegir...</option>
                                <option value="cursar" {{ (old("tipo") == 'cursar' ? "selected":"") }}>cursada</option>
                                <option value="aprobar" {{ (old("tipo") == 'aprobar' ? "selected":"") }}>aprobada</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputMateria">Condición</label>
                            <select name="condicion" class="custom-select" id="inlineFormCustomSelectPref" required>

                                <option selected>Elegir...</option>
                                <option value="cursar" {{ (old("condicion") == 'cursar' ? "selected":"") }}>cursada</option>
                                <option value="aprobar" {{ (old("condicion") == 'aprobar' ? "selected":"") }}>aprobada</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputMateria">Matería</label>
                            <select name="materia" class="custom-select" id="inlineFormCustomSelectPref" required>

                                <option selected>Elegir...</option>
                                @foreach ($materias as $m)
                                    <option value="{{ $m->codigo }}" {{ (old("materia") == $m->codigo ? "selected":"") }}>({{ $m->codigo }}) {{ $m->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">agregar correlativa</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>