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

// Obtener el ID del curso desde la URL
$id_curso = $_GET['id_curso'];

// Consulta SQL para obtener los estudiantes del curso específico
$sql_estudiantes_por_curso = "
    SELECT e.ID_estudiante, e.Nombres, e.Apellidos, e.ID_curso, e.ID_grado, n.Valor 
    FROM estudiante e 
    LEFT JOIN nota n ON e.ID_estudiante = n.ID_estudiante
    WHERE e.ID_curso = $id_curso
";
$result_estudiantes_por_curso = $conn->query($sql_estudiantes_por_curso);

// Array para almacenar estudiantes por curso
$estudiantes_por_curso = array();
if ($result_estudiantes_por_curso->num_rows > 0) {
    while ($row = $result_estudiantes_por_curso->fetch_assoc()) {
        $curso = $row["ID_curso"];
        if (!isset($estudiantes_por_curso[$curso])) {
            $estudiantes_por_curso[$curso] = array();
        }
        $estudiantes_por_curso[$curso][] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
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
                        <div class="circulo"></div>
                    </div>
                </div>
            </div>
    
            <div class="usuario">
                <img src="../Imagenes/profile.jpg" alt="">
                <div class="info-usuario">
                    <div class="nombre-email">
                        <span class="nombre"><?php echo $nombreDocente ?></span>
                        <span class="email"><?php echo $correoUsuario ?></span>
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
                        <th>ID estudiante</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Valor Notas</th>                
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 1;
                    foreach ($estudiantes_por_curso as $curso => $estudiantes) {
                        foreach ($estudiantes as $estudiante) {
                            echo "<tr>";
                            echo "<td>".$contador."</td>";
                            echo "<td>".$estudiante["ID_estudiante"]."</td>";
                            echo "<td>".$estudiante["Apellidos"]."</td>";
                            echo "<td>".$estudiante["Nombres"]."</td>";
                            
                            if (isset($estudiante["Valor"])) {
                                echo "<td contenteditable='true' data-id-estudiante='".$estudiante["ID_estudiante"]."'>".$estudiante["Valor"]."</td>";
                            } else {
                                echo "<td contenteditable='true' data-id-estudiante='".$estudiante["ID_estudiante"]."'></td>";
                            }
                            
                            echo "</tr>";
                            $contador++;
                        }
                    }
                    
                    if ($contador == 1) {
                        echo "<tr><td colspan='5'>No se encontraron estudiantes.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <button onclick="guardarCambios()">Guardar Cambios</button>
    </main>
    

    <script>
    function guardarCambios() {
        var notasActualizadas = [];

        // Obtener todas las celdas editables de la columna "Valor Notas"
        var celdasNotas = document.querySelectorAll('td[contenteditable="true"]');
        
        // Recorrer cada celda y almacenar los datos en un array
        celdasNotas.forEach(function(celda) {
            var idEstudiante = celda.getAttribute("data-id-estudiante");
            var nuevoValor = celda.innerText.trim(); // Usar .trim() para eliminar espacios en blanco innecesarios

            // Agregar los datos al array de notas actualizadas
            notasActualizadas.push({ id_estudiante: idEstudiante, nuevo_valor: nuevoValor });
        });

        // Enviar las notas actualizadas al servidor utilizando una solicitud AJAX
        fetch('guardar_nota.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(notasActualizadas),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Respuesta del servidor:', data);
            alert('Cambios guardados correctamente.');
        })
        .catch((error) => {
            console.error('Error al enviar la solicitud:', error);
            alert('Error al guardar los cambios.');
        });
    }
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>