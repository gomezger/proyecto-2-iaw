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


Posibles modificaciones en caso de ser excesivo lo planteado:
<ul>
    <li>No crear las vistas de crear carreras y carga de correlativas. Los datos serian cargados a través de los seeders. (Podrían crearse las vistas posterioremnte en react)</li>
    <li>No crear las vistas de opiones. (Podrían crearse las vistas posterioremnte en react)</li>
</ul>






