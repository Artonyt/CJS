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
            <!-- Formulario de búsqueda -->
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Buscar...">
            </div>
            <table>
                <thead>
                    <tr id="fechas">
                        <td colspan="3">FECHA:</td>
                        <td><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="today" /></td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>APELLIDOS</th>
                        <th>NOMBRES</th>
                        <th>ASISTENCIA</th>
                    </tr>
                </thead>
                <tbody id="nameList">
                    
                    <?php
                    $contador = 1;
                    if ($result_cursos->num_rows > 0 && $result_estudiantes->num_rows > 0) {
                        while ($row_curso = $result_cursos->fetch_assoc()) {
                            while ($row_estudiante = $result_estudiantes->fetch_assoc()) {
                                if ($row_curso["id_curso"] == $row_estudiante["ID_curso"]) {
                                    echo "<tr>";
                                    echo "<td>" . $contador . "</td>";
                                    echo "<td>" . $row_estudiante["Apellidos"] . "</td>";
                                    echo "<td>" . $row_estudiante["Nombres"] . "</td>";
                                    echo "<td>";
                                    echo "<form action='guardar_asistencia.php' method='post' enctype='multipart/form-data'>";
                                    // Dentro del bucle while para mostrar los estudiantes
                                    echo "<input type='hidden' name='asignatura_id' value='" . $row_curso["id_curso"] . "'>";

                                    echo "<select name='asistencia' onchange='toggleFileInput(this)'>";
                                    echo "<option value='asistio'>Asistió</option>";
                                    echo "<option value='no-asistio'>No Asistió</option>";
                                    echo "<option value='excusa'>Excusa</option>";
                                    echo "</select>";
                                    echo "<input id='fileInput' type='file' name='excusa-archivo' accept='.docx' style='display:none;'>";
                                    echo "<button type='submit'>Guardar</button>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $contador++;
                                }
                            }
                            // Reiniciar el puntero del conjunto de resultados
                            $result_estudiantes->data_seek(0);
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron datos.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="../js/script.js"></script>
    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none";
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        }
                    }
                }
            }
        });
    </script>
    <script>
        function toggleFileInput(select) {
            var fileInput = select.parentNode.querySelector('#fileInput');
            if (select.value === 'excusa') {
                fileInput.style.display = 'block';
            } else {
                fileInput.style.display = 'none';
            }
        }
    </script>
    <script>
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);
                fetch(this.getAttribute('action'), {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data); // Manejar la respuesta según necesites
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    </script>
</body>
</html>
