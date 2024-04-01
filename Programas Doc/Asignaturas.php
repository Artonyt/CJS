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

    // Consulta SQL para obtener los datos de las asignaturas
    $sql = "SELECT id_materia, Nombre_materia, id_asignatura FROM materia";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CJS</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../imagenes/favicon.ico" type="image/vnd.microsoft.icon">
</head>
<body>

    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
    <div id="cloud">
        <div>
            <div class="nombre-pagina">
                <img src="../Imagenes/favicon.ico" alt="" width="30%">
                <span>CJS</span>
            </div>
        </div>
    </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a href="perfil_docente.php">
                    <ion-icon name="person-outline"></ion-icon>
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
                <li>
                    <a href="Notas.php">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Cursos</span>
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
                        <div class="circulo">
                            
                        </div>
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
    <h1>Asignaturas</h1>
    <div class="top-buttons">
        <a href="agregar_materia.php"><button class="add-button">Agregar Materia</button></a>
        <a href="logout.php"><button id="logout-btn" class="logout-button">Cerrar sesión</button></a>
    </div>
    
    <div class="container">
    <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>Materia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["Nombre_materia"]."</td>";

                    // Botones de acciones uno al lado del otro en la misma celda
                    echo "<td class='action-buttons'>";
                    echo "<a href='editar_materia.php?id=".$row["id_materia"]."'><button class='edit-button'>Editar</button></a>";
                    echo "<form action='eliminar_materia.php' method='post'>";
                    echo "<input type='hidden' name='id_materia' value='".$row["id_materia"]."'>";
                    echo "<button type='submit' class='delete-button'>Eliminar</button>";
                    echo "</form>";
                    echo "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No se encontraron materias.</td></tr>";
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
