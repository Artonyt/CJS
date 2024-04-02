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
    <title>NOTAS</title>
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
                    <span>Modo Oscuro </span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">
                            
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="usuario">
                <img src="../Imagenes/profile.jpg" alt="">
                <div class="info-usuario">
                    <div class="nombre-email">
                        <span class="nombre"><?php echo $nombreDocente?></span>
                        <span class="email"><?php echo $correoUsuario?></span>
                    </div>
                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
        </div>

    </div>


<main>
        <h1>Notas</h1>
        
        <div class="container">
        <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>N°</th>
                <th>ID Curso</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Valor Notas</th>                
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
        </div>
</main>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>
