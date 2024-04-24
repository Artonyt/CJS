<?php
// Definir las credenciales de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "colegio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de curso
$sql_cursos = "SELECT id_curso, nombre_curso, id_grado FROM curso";
$result_cursos = $conn->query($sql_cursos);

// Consulta SQL para obtener los datos de estudiantes
$sql_estudiantes = "SELECT id_estudiante, Nombres, Apellidos, ID_curso, ID_grado FROM estudiante";
$result_estudiantes = $conn->query($sql_estudiantes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Se establece la codificación de caracteres -->
    <meta charset="UTF-8">
    <!-- Se establece la etiqueta meta viewport para la correcta visualización en dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página -->
    <title>CJS</title>
    <!-- Enlace a la hoja de estilos externa "style.css" -->
    <link rel="stylesheet" href="../css/style.css">
</head>



<body>
    <!-- Contenedor del menú -->
    <div class="menu">
        <!-- Icono para abrir el menú -->
        <ion-icon name="menu-outline"></ion-icon>
        <!-- Icono para cerrar el menú -->
        <ion-icon name="close-outline"></ion-icon>
    </div>
    
    <div class="barra-lateral">
    <!-- Enlace al perfil del docente -->
    <div>
        <a href="perfil_docente.php">
            <!-- Contenedor del nombre de la página -->
            <div class="nombre-pagina">
                <!-- Logo de la página -->
                <img src="../Imagenes/logo (2).png" alt="" width="40%">
            </div>
        </a>  
    </div>
    <nav class="navegacion">
    <ul>
        <!-- Elemento de navegación para el perfil -->
        <li>
            <a id="inbox" href="perfil_docente.php">
                <!-- Icono para el perfil -->
                <ion-icon name="mail-unread-outline"></ion-icon>
                <!-- Texto del enlace -->
                <span>Perfil</span>
            </a>
        </li>
        <!-- Elemento de navegación para las asignaturas -->
        <li>
            <a href="Asignaturas.php">
                <!-- Icono para las asignaturas -->
                <ion-icon name="star-outline"></ion-icon>
                <!-- Texto del enlace -->
                <span>Asignaturas</span>
            </a>
        </li>
        <!-- Elemento de navegación para los cursos -->
        <li>
            <a href="Cursos.php">
                <!-- Icono para los cursos -->
                <ion-icon name="document-text-outline"></ion-icon>
                <!-- Texto del enlace -->
                <span>Cursos</span>
            </a>
        </li>
        <!-- Separador y título para las planillas -->
        <br>
        <h4>Planillas</h4>
        <br>
        <!-- Elemento de navegación para las asistencias -->
        <li>
            <a href="Asistencias.php">
                <!-- Icono para las asistencias -->
                <ion-icon name="paper-plane-outline"></ion-icon>
                <!-- Texto del enlace -->
                <span>Asistencias</span>
            </a>
        </li>
    </ul>
</nav>
<div>
    <!-- Separador de línea -->
    <div class="linea"></div>
    <!-- Contenedor del modo oscuro -->
    <div class="modo-oscuro">
        <!-- Información del modo oscuro -->
        <div class="info">
            <!-- Icono para el modo oscuro -->
            <ion-icon name="moon-outline"></ion-icon>
            <!-- Texto para el modo oscuro -->
            <span>Modo Oscuro</span>
        </div>
        <!-- Interruptor para cambiar al modo oscuro -->
        <div class="switch">
            <!-- Base del interruptor -->
            <div class="base">
                <!-- Círculo que representa el interruptor -->
                <div class="circulo"></div>
            </div>
        </div>
    </div>
    <!-- Contenedor del usuario -->
    <div class="usuario">
        <!-- Imagen del perfil del usuario -->
        <img src="../Imagenes/profile.jpg" alt="">
        <!-- Información del usuario -->
        <div class="info-usuario">
            <!-- Nombre y correo electrónico del usuario -->
            <div class="nombre-email">
                <span class="nombre"><?php echo $nombreUsuario?></span>
                <span class="email"><?php echo $correoUsuario?></span>
            </div>
            <!-- Icono para mostrar más opciones del usuario -->
            <ion-icon name="ellipsis-vertical-outline"></ion-icon>
        </div>
    </div>
</div>

    </div>
    <main>
       <!-- Título  -->
<h1>Asistencia</h1>
<!-- Contenedor de la imagen de navegación -->
<span class="nav_image">
    <!-- Imagen del perfil -->
    <img src="../Imagenes/profile.jpg" logo_img" width="10%" />
</span>

        <div class="container">
             <!-- Formulario de búsqueda -->
             <div class="search-container">
                <form action="" method="GET">
                    <input type="text" name="query" placeholder="Buscar...">
                    <button type="submit">Buscar</button>
                </form>
            </div>

            <!-- Resultados de la búsqueda -->
            <div class="search-results">
                <?php
                if (isset($_GET['query'])) {
                    $search_query = $_GET['query'];
                    $sql_search = "SELECT * FROM estudiante WHERE Nombres LIKE '%$search_query%' OR Apellidos LIKE '%$search_query%'";
                    $result_search = $conn->query($sql_search);

                    if ($result_search->num_rows > 0) {
                        echo "<ul>";
                        while ($row = $result_search->fetch_assoc()) {
                            echo "<li>" . $row["Nombres"] . " " . $row["Apellidos"] . "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "No se encontraron resultados.";
                    }
                }
                ?>
            </div>

            <table>
                <thead>
               <!-- Fila de la tabla para seleccionar la fecha -->
<tr id="fechas">
    <!-- Celda que abarca varias columnas para mostrar "FECHA:" -->
    <td colspan="4">FECHA:</td>
    <!-- Celda con el campo de entrada de tipo "date" para seleccionar la fecha -->
    <td><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="today" /></td>
</tr>

               
                </thead>
                <tbody>
                 
                <script>
    // Selecciona el elemento de entrada de búsqueda y agrega un event listener para detectar cambios en su valor
    document.getElementById("searchInput").addEventListener("input", function() {
        // Declara las variables para almacenar el input, el filtro, la lista ul, los elementos de lista li y el nombre
        var input, filter, ul, li, name, i;
        input = document.getElementById("searchInput"); // Selecciona el elemento de entrada de búsqueda
        filter = input.value.toUpperCase(); // Obtiene el valor del input y lo convierte a mayúsculas para la comparación
        ul = document.getElementById("nameList"); // Selecciona la lista ul que contiene los elementos de lista
        li = ul.getElementsByTagName("li"); // Obtiene todos los elementos de lista dentro de la lista ul
        // Itera sobre cada elemento de lista li
        for (i = 0; i < li.length; i++) {
            name = li[i].textContent; // Obtiene el texto dentro del elemento de lista
            // Comprueba si el texto coincide con el filtro
            if (name.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = ""; // Muestra el elemento de lista si coincide con el filtro
            } else {
                li[i].style.display = "none"; // Oculta el elemento de lista si no coincide con el filtro
            }
        }
    });
</script>



<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>
  
    <main>
      
    <div class="container">
    <!-- Contenedor principal de la tabla -->
    <table>
        <!-- Encabezado de la tabla -->
        <thead>
            <tr>
                <!-- Encabezados de las columnas -->
                <th>ID</th> <!-- Columna para mostrar el ID del estudiante -->
                <th>APELLIDOS</th> <!-- Columna para mostrar los apellidos del estudiante -->
                <th>NOMBRES</th> <!-- Columna para mostrar los nombres del estudiante -->
                <th>ASISTENCIA</th> <!-- Columna para mostrar la asistencia del estudiante -->
            </tr>
        </thead>

                <tbody>
                <?php
$contador = 1; // Inicialización del contador
if ($result_cursos->num_rows > 0 && $result_estudiantes->num_rows > 0) { // Verificación de que hay cursos y estudiantes
    while ($row_curso = $result_cursos->fetch_assoc()) { // Iteración sobre cada curso
        // Muestra el curso y el grado para cada estudiante en el curso actual
        while ($row_estudiante = $result_estudiantes->fetch_assoc()) { // Iteración sobre cada estudiante
            if ($row_curso["id_curso"] == $row_estudiante["ID_curso"]) { // Verificación si el estudiante pertenece al curso actual
                echo "<tr>"; // Inicio de la fila de la tabla
                echo "<td>" . $contador . "</td>"; // Celda para mostrar el ID del estudiante
                echo "<td>" . $row_estudiante["Apellidos"] . "</td>"; // Celda para mostrar los apellidos del estudiante
                echo "<td>" . $row_estudiante["Nombres"] . "</td>"; // Celda para mostrar los nombres del estudiante
                echo "<td>"; // Celda para el formulario de asistencia
                echo "<form action='guardar_asistencia.php' method='post'>"; // Formulario para enviar la asistencia del estudiante
                echo "<input type='hidden' name='id_estudiante' value='" . $row_estudiante["id_estudiante"] . "'>"; // Campo oculto para el ID del estudiante
                echo "<select name='asistencia'>"; // Selector de opciones para la asistencia
                echo "<option value='asistio'>Asistió</option>"; // Opción para indicar que el estudiante asistió
                echo "<option value='no-asistio'>No Asistió</option>"; // Opción para indicar que el estudiante no asistió
                echo "<option value='excusa'>Excusa</option>"; // Opción para indicar que el estudiante presentó una excusa
                echo "</select>"; // Fin del selector de opciones
                echo "<input type='file' name='excusa-archivo' accept='.docx'>"; // Campo de carga de archivos para la excusa
                echo "<button type='submit'>Guardar</button>"; // Botón para enviar el formulario
                echo "</form>"; // Fin del formulario
                echo "</td>"; // Fin de la celda
                echo "</tr>"; // Fin de la fila
                $contador++; // Incremento del contador
            }
        }
        // Reinicia el puntero del resultado de los estudiantes para volver a recorrerlos
        $result_estudiantes->data_seek(0);
    }
} else {
    echo "<tr><td colspan='5'>No se encontraron datos.</td></tr>"; // Mensaje en caso de no haber datos
}
$conn->close(); // Cierre de la conexión con la base de datos
?>

                </tbody>
            </table>
        </div>
    </main>
    
    <script src="../js/script.js"></script> <!-- Inclusión del archivo de script externo -->

</body>
</html>