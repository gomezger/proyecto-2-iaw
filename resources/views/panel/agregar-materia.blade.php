<!-- Modal -->
<div class="modal fade" id="agregarMateriaModal" tabindex="-1" role="dialog" aria-labelledby="agregarMateriaModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="POST" action="{{route('agregar-materia')}}" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    @if($errors->any() && old('agregar'))

                        @section('scripts')
                            <script>    
                                document.addEventListener("DOMContentLoaded", function(event) {
                                    $('#agregarMateriaModal').modal('toggle');
                                });                                    
                            </script>
                        @endsection


                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ( $errors->all() as $error )
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputCodigo">Código</label>
                            <input type="number" min="0" class="form-control" id="inputCodigo" name="codigo" placeholder="Código" value="{{old('codigo')}}" required>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="inputMateria">Nombre</label>
                            <input type="text" class="form-control" id="inputMateria" name="nombre" placeholder="Nombre de la materia"value="{{old('nombre')}}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputProfesor">Profesor</label>
                            <input type="text" class="form-control" id="inputProfesor" name="profesor" placeholder="Profesor" value="{{old('profesor')}}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="inputMateria">Foto del profesor</label>
                            <div class="custom-file">
                                <input name="profesor_foto" type="file" class="custom-file-input" id="validatedCustomFile"value="{{old('profesor_foto')}}" required>
                                <label class="custom-file-label" for="validatedCustomFile">Elegir...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                              </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="inputMateria">Cuatrimestre</label>
                            <select name="cuatrimestre" class="custom-select" id="inlineFormCustomSelectPref" required>

                                <option selected>Elegir...</option>
                                @for ( $c=1; $c<=10; $c++)
                                    <option value="{{ $c }}" {{ (old("cuatrimestre") == $c ? "selected":"") }}>{{ $c }}</option>
                                @endfor
                            </select>
                        </div>
                        <input type="hidden" name="agregar" value="agregar" required>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar materia</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>