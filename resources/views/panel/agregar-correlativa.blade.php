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
                
                <form method="POST" action="{{route('agregar-correlativa')}}" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    @if($errors->any() && old('agregar-correlativa-'.$materia->codigo.''))

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
                        <div class="form-group col-md-12">
                            <label for="inputMateria">Matería</label>
                            <select name="materia" class="custom-select" id="inlineFormCustomSelectPref" readonly required>
                                <option value="{{ $materia->codigo }}" selected>({{ $materia->codigo }}) {{ $materia->nombre }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputMateria">Tipo</label>
                            <select name="tipo" class="custom-select" id="inlineFormCustomSelectPref" required>
                                <option value="" selected>Elegir...</option>
                                <option value="cursada" {{ (old("tipo") == 'cursada' ? "selected":"") }}>Parar cusar</option>
                                <option value="aprobada" {{ (old("tipo") == 'aprobada' ? "selected":"") }}>Para rendir final</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputMateria">Condición</label>
                            <select name="condicion" class="custom-select" id="inlineFormCustomSelectPref" required>
                                <option value="" selected>Elegir...</option>
                                <option value="cursada" {{ (old("condicion") == 'cursar' ? "selected":"") }}>cursada</option>
                                <option value="aprobada" {{ (old("condicion") == 'aprobar' ? "selected":"") }}>aprobada</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputMateria">Requiere</label>
                            <select name="requiere" class="custom-select" id="inlineFormCustomSelectPref" required>

                                <option value="" selected>Elegir...</option>
                                @foreach ($materias as $m)
                                    @if ($m->codigo!=$materia->codigo)
                                        <option value="{{ $m->codigo }}" {{ (old("requiere") == $m->codigo ? "selected":"") }}>({{ $m->codigo }}) {{ $m->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <input name="agregar-correlativa-{{$materia->codigo}}" value="correlativa" type="hidden" />
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