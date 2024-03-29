# Proyecto 2: historial de cursadas en Laravel

Germán A. Gómez

Página en heroku: https://proyecto2-german.herokuapp.com/ <br>
Video de presentación: https://www.youtube.com/watch?v=lN5RY_TekR4 (perdón por el audio, tuve problemas con el micro y las otras alternativas que tenian eran peores) <br>

## Descripción

<b>Historial de cursadas</b>: el alumno de Licenciatura en Cs. de la Computación puede agregar las materias que tiene cursadas y/o aprobadas. El sistema le avisará que materias puede cursar ya que verifica las correlativas.

## Instalación

> composer install <br>
> npm install <br>
> npm run dev <br>

## Usuarios de prueba
<ul>
    <li><b>Usuario alumno</b>: germang08@hotmail.com y la contraseña es 1234. Tambien se puede registrar por la web.</li>
    <li><b>Administrador</b>: germang04@gmail.com y la contraseña es 1234.</li>
</ul>


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
    <li>Usuarios: no se pueden crear usuarios administradores desde la web</li>
    <li>Notas: no se pueden cargar notas desaprobadas</li>
</ul>

## Probar ApiRest

Coleción de Postman: https://github.com/xeronweb/proyecto-2-iaw/blob/master/proyecto%202%20iaw.postman_collection.json 

### Obtener token de acceso

url: /api/auth/login <br>
method: Post  <br>
headers:  <br>
>Accept: application/json <br>
>X-Requested-With: XMLHttpRequest<br>

Body: json<br>
>{ <br>
>    "email": "mail@dominio.com", <br>
>    "password": "1234" <br>
> \} <br>

Resultado: <br>
>{ <br>
> access_token: [token]<br>
> token_type: Bearer <br>  
> expires_at : AAAA-MM-DD HH:MM:SS <br>
> \} <br>

### Materias cursadas

url: /api/cursadas <br>
method: GET  <br>
headers:  <br>
>Accept: application/json <br>
>X-Requested-With: XMLHttpRequest<br>
>Authorization: Bearer [token]<br>

Resultado: <br>
>{ <br>
> status: [success or error]<br>
> cursadas: es un arreglo que tiene {"alumno","materia","final"}
>  \}

### Materias aprobadas

url: /api/aprobadas <br>
method: GET  <br>
headers:  <br>
>Accept: application/json <br>
>X-Requested-With: XMLHttpRequest<br>
>Authorization: Bearer [token]<br>

Resultado: <br>
>{ <br>
> status: [success or error]<br>
> cursadas: es un arreglo que tiene {"alumno","materia","final"}<br>
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
> status: [success or error]<br>
> promedio: [float]<br>
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
> status: [success or error]<br>
> promedios: es un arreglo que tiene {"materia","promedio"}<br>
> \}

### materias que peude cursar

url: /api/a-cursar <br>
method: GET  <br>
headers:  <br>
>Accept: application/json <br>
>X-Requested-With: XMLHttpRequest<br>
>Authorization: Bearer [token]<br>

Resultado: <br>
>{ <br>
> status: [success or error]<br>
> materias: es un arreglo que tiene nombre de materias<br>
> \}

### materias que peude rendir final

url: /api/a-rendir <br>
method: GET  <br>
headers:  <br>
>Accept: application/json <br>
>X-Requested-With: XMLHttpRequest<br>
>Authorization: Bearer [token]<br>

Resultado: <br>
>{ <br>
> status: [success or error]<br>
> materias: es un arreglo que tiene nombre de materias<br>
> \}
