# Proyecto 2: historial de cursadas y opiniones en Laravel
Germán A. Gómez

<ol>
    <li>
        <b>Historial de cursadas</b>: el alumno puede elegir una carrera que esté cursando y luego agregar que materias cursadas y aprobadas. El sistema le avisará que materias puede cursar ya que cumplen con las correlativas.
    </li>
    <li>
        <b>Opiniones</b>: el alumno puede elegir agregar una opinión sobre una materia.
    </li>
</ol>


<b>Tipos de usuarios</b>
<ul>
    <li><b>Usuario alumno</b>: puede elegir una carrera, agregar estado de cursada, agregar opiniones.</li>
    <li><b>Adminsitrador</b>: puede agregar carreras y materias al sistema.</li>
</ul>
    
<b>Modelos: </b>
<ul>
    <li><b>Usuarios</b>: dos tipos (alumnos y admin)</li>
    <li><b>Materias</b>: código, nombre, nombre, profesor, foto profesor, duración (cuatrimestral/anual)</li>
    <li><b>Carreras</b>: código, nombre, duración (en años)</li>
    <li><b>Historial materias</b>: alumno, materia, final</li>
    <li><b>Correlativas</b>: materia, materia requerida, tipo (fuerte/blanca), requiere (cursada/final)</li> 
    <li><b>Opiniones</b>: materia, alumno, claridad (al explicar), carisma, predisposición (a ayudar), dificultad, comentario</li>
</ul>

<b>Etapa 3:</b>
<ul>
    <li>En la etapa 2 solo se pueden crear opiniones por lo cual las "vistas" donde se ven todas están pensadas para hacerse en la etapa 3.</li>
    <li>Mostrar gráficos con datos de cuantos alumnos hay en cada año, etc.</li>
</ul>

Posibles modificaciones en caso de ser excesivo lo planteado:
<ul>
    <li>El adminstrador no carga carreras (se crean por seeders). Por lo cual solo crearia materías con sus respectivs correlativas.</li>
    <li>Otra opción sería eliminar el apartado de opiniones y agregar otra carateristica en la etapa 3.</li>
</ul>

Posibles modificaciones en caso de faltar cosas:
<ul>
    <li>Agregar un modelo "profesor" y separarlo del modelo "materias". Originalmente lo habia pensado así pero realice la simplificación para achicar el proyecto</li>
    <li>El administrador puede eliminar opiniones</li>
</ul>
