
    
<div class="correlativas col-12">

    <h5 class="titulo">Para cursar</h5>
    
    <table class="table table-sm ">
        <tbody>
            @if(count($materia->correlativas_cursadas_cursadas)==0 && count($materia->correlativas_cursadas_aprobadas)==0)
                <tr>
                    <td colspan="3">No hay materias requeridas</td>
                </tr>
            @else
                @include('materias/materia-correlativa', [ "correlativas" => $materia->correlativas_cursadas_cursadas])
                @include('materias/materia-correlativa', [ "correlativas" => $materia->correlativas_cursadas_aprobadas])
            @endif
        </tbody>
    </table>

    <h5 class="titulo">Para rendir final</h5>
    
    <table class="table table-sm ">
        <tbody>
            @if(count($materia->correlativas_aprobadas_cursadas)==0 && count($materia->correlativas_aprobadas_aprobadas)==0)
                <tr>
                    <td colspan="3">No hay materias requeridas</td>
                </tr>
            @else
                @include('materias/materia-correlativa', [ "correlativas" => $materia->correlativas_aprobadas_cursadas])
                @include('materias/materia-correlativa', [ "correlativas" => $materia->correlativas_aprobadas_aprobadas])
            @endif
        </tbody>
    </table>

</div>
