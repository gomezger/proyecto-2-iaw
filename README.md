# Proyecto 2: historial de cursadas en Laravel
Germán A. Gómez

## Descripción

<b>Historial de cursadas</b>: el alumno de Licenciatura en Cs. de la Computación puede agregar las materias que tiene cursadas y/o aprobadas. El sistema le avisará que materias puede cursar ya que verifica las correlativas.

## Detalles de implementación (alto nivel)

<b>Tipos de usuarios</b>
<ul>
    <li><b>Usuario alumno</b>: agregar estado de cursada de sus materias.</li>
    <li><b>Administrador</b>: puede agregar materias y sus correlativas al sistema.</li>
</ul>
    
<b>Modelos: </b>
<ul>
    <li><b>Usuarios</b>: dos tipos (alumnos y admin explicados arriba)</li>
    <li><b>Materias</b>: código, nombre, nombre profesor, foto profesor, cuatrimestre</li>
    <li><b>Historial materias</b>: alumno, materia, final</li>
    <li><b>Correlativas</b>: materia, materia requerida, tipo (cursada/aprobada), requiere (cursada/aprobada)</li> 
</ul>

<b>ApiRest: </b>
<ul>
    <li><b>Materias cursadas</b>: retorna un listado de materias cursadas</li>
    <li><b>Materias aprobadas</b>: retorna un listado de materias aprobadas</li>
    <li><b>Promedio alumno</b>: retorna el promedio del alumno</li>
    <li><b>Promedio materia</b>: retorna el promedio de la materia</li>
</ul>

## Consideraciones Generales

Fueron eliminas ciertas funcionalidades por pedido de la catedra:
<ul>
    <li>Comentarios sobre las materias</li>
    <li>Carreras: originalmente era para varias carreras. Ahora es solo para licenciatura</li>
    <li>Correlativas: no se pueden eliminar correlativas</li>
</ul>

## Probar ApiRest

### Obtener token de acceso

url: /api/auth/login <br>
method: Post  <br>
headers:  <br>
>Accept: application/json <br>
>X-Requested-With: XMLHttpRequest<br>

Body: json<br>
>{ <br>
>\t"email": "mail@dominio.com", <br>
>\t"password": "1234" <br>
>} <br>

Resultado: <br>
>{ <br>
>\taccess_token: [token]<br>
>\ttoken_type: Bearer <br>  
>\texpires_at : AAAA-MM-DD HH:MM:SS<br>
> \}

### Materias cursadas

url: /api/cursadas <br>
method: GET  <br>
headers:  <br>
>Accept: application/json <br>
>X-Requested-With: XMLHttpRequest<br>
>Authorization: Bearer [token]<br>

Resultado: <br>
>{ <br>
>\tstatus: [success or error]<br>
>\tcursadas: es un arreglo que tiene {"alumno","materia","final"}
> }

### Materias aprobadas

url: /api/aprobadas <br>
method: GET  <br>
headers:  <br>
>Accept: application/json <br>
>X-Requested-With: XMLHttpRequest<br>
>Authorization: Bearer [token]<br>

Resultado: <br>
>{ <br>
>\tstatus: [success or error]<br>
>\tcursadas: es un arreglo que tiene {"alumno","materia","final"}<br>
> \}

### Promedio alumno

url: /api/promedioAlumno <br>
method: GET  <br>
headers:  <br>
>Accept: application/json <br>
>X-Requested-With: XMLHttpRequest<br>
>Authorization: Bearer [token]<br>

Resultado: <br>
>{ <br>
>\tstatus: [success or error]<br>
>\tpromedio: [float]<br>
> \}

### Promedio de materias

url: /api/promedioMaterias <br>
method: GET  <br>
headers:  <br>
>Accept: application/json <br>
>X-Requested-With: XMLHttpRequest<br>
>Authorization: Bearer [token]<br>

Resultado: <br>
>{ <br>
>\tstatus: [success or error]<br>
>\tpromedios: es un arreglo que tiene {"materia","promedio"}<br>
> \}
