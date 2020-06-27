<div class="clearfix col-12 col-md-4 pt-4 pt-md-0 pl-0 pl-md-5 float-left ">
    @if(session('status-error'))
        <div class="alert alert-danger">
            {{session('status-error')}}
        </div>
    @endif

    @if(session('status-success'))
        <div class="alert alert-success">
            {{session('status-success')}}
        </div>
    @endif
            
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ( $errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- AGREGAR CURSADA --}}

    <div class="col-12 shadow-sm p-3 mb-4 bg-white rounded ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Agregar cursada</li>
            </ol>
        </nav>
        <form method="POST" action="{{route('agregar-cursada-post')}}">  
            {!! csrf_field() !!}     
            <div class="form-group">
                <select name="codigo" class="form-control" required>
                    <option value="">Elegir materia</option>
                    @foreach($cuatris as $cuatri)
                        @foreach($cuatri as $materia)
                            <option value="{{$materia->codigo}}">({{$materia->codigo}}) {{$materia->nombre}}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <button type="submit" class="col-12 btn btn-light">Actualizar</button>
        </form>
    </div>

    
    {{-- AGREGAR FINAL --}}

    <div class="col-12 shadow-sm p-3 mb-4 bg-white rounded">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Agregar final</li>
            </ol>
        </nav>
        <form method="GET" action="{{route('agregar-final-post')}}">       
            {!! csrf_field() !!}             
            <div class="form-group">
                <select name="codigo" class="form-control col-7 float-left" required>
                    <option  value="">Elegir materia</option>
                    @foreach($cuatris as $cuatri)
                        @foreach($cuatri as $materia)
                            <option value="{{$materia->codigo}}">({{$materia->codigo}}) {{$materia->nombre}}</option>
                        @endforeach
                    @endforeach
                </select>
                <select name="nota" class="form-control col-4 float-right">
                    <option value="">Nota</option>
                    @for($nota=4; $nota<=10; $nota++)
                        <option>{{$nota}}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="col-12 mt-3 btn btn-light">Actualizar</button>
        </form>
    </div>


    {{-- lINKS DE INTERESL --}}

    <div class="col-12 shadow-sm p-3 mb-5 bg-white rounded">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Links de interes</li>
            </ol>
        </nav>
        <div class="col-12">
            <p><a href="https://www.uns.edu.ar/" target="_blank" class="text-info">Página oficial de la UNS</a></p>
            <p><a href="https://www.uns.edu.ar/g3w" target="_blank" class="text-info">Guaraní3W</a></p>
            <p><a href="https://www.uns.edu.ar/alumnos/aulas" target="_blank" class="text-info">Aulas, Horarios y Materias</a></p>
            <p><a href="https://moodle.uns.edu.ar/catedras/" target="_blank" class="text-info">Moodle-UNS</a></p>
            <p><a href="https://www.uns.edu.ar/alumnos/calendario-academico" target="_blank" class="text-info">Calendario Académico</a></p>
            <p><a href="https://www.uns.edu.ar/alumnos/links-interes" target="_blank" class="text-info">Otros links de Interés</a></p>
        </div>
    </div>
</div>
