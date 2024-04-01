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

// Verificar si se ha enviado un ID de curso a editar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_curso = $_GET['id'];

    // Consulta SQL para obtener los detalles del curso seleccionado
    $sql = "SELECT * FROM curso WHERE id_curso = $id_curso";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos del curso
        $row = $result->fetch_assoc();
        $nombre_curso = $row["nombre_curso"];
        // Otros campos que desees editar

        // Mostrar el formulario de edición
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Curso</title>
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
            <h1>Editar Curso</h1>
            <form action="../guardar_edicion_curso.php" method="post">
                <input type="hidden" name="id_curso" value="<?php echo $id_curso; ?>">
                <label for="nombre">Nombre del Curso:</label><br>
                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre_curso; ?>"><br>
                <!-- Otros campos que desees editar -->
                <input type="submit" value="Guardar Cambios">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontró el curso a editar.";
    }
} else {
    echo "ID de curso no proporcionado.";
}
$conn->close();
?>
