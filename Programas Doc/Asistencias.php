<?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Colegio";

    $conn = new mysqli($servername, $username, $password, $database);

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CJS</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>
    
    <div class="barra-lateral">
        <div>
            <a href="perfil_docente.php">
                <div class="nombre-pagina">
                    <img src="../Imagenes/logo (2).png" alt="" width="40%">
                </div>
            </a>  
        </div>
        <nav class="navegacion">
            <ul>
                <li>
                    <a id="inbox" href="perfil_docente.php">
                        <ion-icon name="mail-unread-outline"></ion-icon>
                        <span>Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="Asignaturas.php">
                        <ion-icon name="star-outline"></ion-icon>
                        <span>Asignaturas</span>
                    </a>
                </li>
                <li>
                    <a href="Cursos.php">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Cursos</span>
                    </a>
                </li>
                <br>
                <h4>Planillas</h4>
                <br>
                <li>
                    <a href="Asistencias.php">
                        <ion-icon name="paper-plane-outline"></ion-icon>
                        <span>Asistencias</span>
                    </a>
                </li>
                <li>
                    <a href="Notas.php">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Notas</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div>
            <div class="linea"></div>
            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Modo Oscuro</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo"></div>
                    </div>
                </div>
            </div>
            <div class="usuario">
                <img src="../Imagenes/profile.jpg" alt="">
                <div class="info-usuario">
                    <div class="nombre-email">
                        <span class="nombre"><?php echo $nombreUsuario?></span>
                        <span class="email"><?php echo $correoUsuario?></span>
                    </div>
                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>
    <main>
        <h1>Asistencia</h1>
        <span class="nav_image">
            <img src="../Imagenes/profile.jpg" logo_img" width="10%" />
        </span>
        <div class="container">
            <table>
                <thead>
                    <tr id="fechas">
                        <td colspan="4">FECHA:</td>
                        <td><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="today" /></td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>APELLIDOS</th>
                        <th>NOMBRES</th>
                        <th>ASISTENCIA</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <input type="text" id="searchInput" placeholder="Buscar nombres...">
                    <ul id="nameList">
                        <!-- Agrega más nombres según sea necesario -->
                    </ul>
                    <script>
                        document.getElementById("searchInput").addEventListener("input", function() {
                            var input, filter, ul, li, name, i;
                            input = document.getElementById("searchInput");
                            filter = input.value.toUpperCase();
                            ul = document.getElementById("nameList");
                            li = ul.getElementsByTagName("li");
                            for (i = 0; i < li.length; i++) {
                                name = li[i].textContent;
                                if (name.toUpperCase().indexOf(filter) > -1) {
                                    li[i].style.display = "";
                                } else {
                                    li[i].style.display = "none";
                                }
                            }
                        });
                    </script>
                    <?php
                        $contador = 1;
                        if ($result_cursos->num_rows > 0 && $result_estudiantes->num_rows > 0) {
                            while($row_curso = $result_cursos->fetch_assoc()) {
                                // Muestra el curso y el grado para cada estudiante en el curso actual
                                while($row_estudiante = $result_estudiantes->fetch_assoc()) {
                                    if ($row_curso["id_curso"] == $row_estudiante["ID_curso"]) {
                                        echo "<tr>";
                                        echo "<td>".$contador."</td>";
                                        echo "<td>".$row_curso["id_curso"]."</td>";
                                        echo "<td>".$row_estudiante["Apellidos"]."</td>";
                                        echo "<td>".$row_estudiante["Nombres"]."</td>";
                                        echo "</tr>";
                                        $contador++;
                                    }
                                }
                                // Reinicia el puntero del resultado de los estudiantes para volver a recorrerlos
                                $result_estudiantes->data_seek(0);
                            }
                        } else {
                            echo "<tr><td colspan='5'>No se encontraron datos.</td></tr>";
                        }
                        $conn->close();
                    ?>
                <td>
                    <form id="registro-asistencia" action="guardar_asistencia.php" method="post">
                        <input type="hidden" id="nombre" name="nombre" value="Nombre del estudiante">
                        <label><input type="radio" name="asistencia" value="asistio"> Asistió</label>
                        <label><input type="radio" name="asistencia" value="no-asistio"> No Asistió</label>
                        <label><input type="radio" name="asistencia" value="excusa"> Excusa</label><br><br>
                        <label for="excusa-archivo">Subir archivo de excusa (docx):</label>
                        <input type="file" id="excusa-archivo" name="excusa-archivo" accept=".docx"><br><br>
                        <button type="submit">Guardar</button>
                    </form>
                    <?php
                        // Verificar si se ha enviado un formulario de asistencia
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Verificar si se han recibido todos los datos necesarios
                            if (isset($_POST['nombre']) && isset($_POST['asistencia'])) {
                                // Obtener los datos del formulario
                                $nombre = $_POST['nombre'];
                                $asistencia = $_POST['asistencia'];
                                // Conexión a la base de datos
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $database = "colegio";
                                $conn = new mysqli($servername, $username, $password, $database);
                                if ($conn->connect_error) {
                                    die("Error de conexión: " . $conn->connect_error);
                                }
                                // Insertar los datos de asistencia en la base de datos
                                $sql = "INSERT INTO observaciones (nombre, asistencia) VALUES ('$nombre', '$asistencia')";
                                if ($conn->query($sql) === TRUE) {
                                    echo "Asistencia guardada correctamente.";
                                } else {
                                    echo "Error al guardar la asistencia: " . $conn->error;
                                }
                                $conn->close();
                            } else {
                                echo "Todos los campos son requeridos.";
                            }
                        } else {
                            echo "No se ha enviado ningún formulario.";
                        }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</main>
<script>
    document.getElementById("registro-asistencia").addEventListener("submit", function(event) {
        event.preventDefault();
        var nombre = document.getElementById("nombre").value;
        var seleccion = document.querySelector('input[name="asistencia"]:checked');
        var excusaArchivo = document.getElementById("excusa-archivo").files[0];
        if (nombre && seleccion) {
            var resultadoDiv = document.getElementById("resultado");
            var mensaje = "Se ha registrado la asistencia de " + nombre + ": " + seleccion.value;
            if (seleccion.value === "excusa" && excusaArchivo) {
                mensaje += " con archivo de excusa: " + excusaArchivo.name;
            }
            resultadoDiv.textContent = mensaje;
        }
    });
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="../js/script.js"></script>
</body>
</html>