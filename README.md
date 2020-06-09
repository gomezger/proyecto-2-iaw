# Proyecto 2:  Laravel

Germán A. Gómez

<i><b>Aplicación</b></i>: sistema de historial de cursadas y opiniones. 

<ol>
    <li>
        <b>Historial de cursadas</b>: el alumno puede elegir una carrera que esté cursando y luego agregar que materias cursadas y aprobadas. El sistema le avisará que materias puede cursar ya que cumplen con las correlativas.
    </li>
    <li>
        <b>Opiniones</b>: el alumno puede elegir agregar una opinión sobre una materia.
    </li>
</ol>


<b>Tipos de usuarios<b>
<ul>
    <li>Usuario alumno: puede elegir una carrera, agregar estado de cursada, agregar opiniones.</li>
    <li>Adminsitrador: puede agregar carreras y materias al sistema.</li>
</ul>
    
<b>Modelos: </b>
<ul>
    <li>Usuarios: dos tipos (alumnos y admin)</li>
    <li>Materias: código, nombre, duración (cuatrimestral/anual)</li>
    <li>Carreras: código, nombre, duración (en años)</li>
    <li>Historial materias: alumno, materia, final</li>
    <li>Correlativas: materia, materia requerida, tipo (fuerte/blanca), requiere (cursada/final)</li> 
    <li>Opiniones: materia, alumno, profesor, claridad (al explicar), carisma, predisposición (a ayudar), dificultad, comentario</li>
</ul>



