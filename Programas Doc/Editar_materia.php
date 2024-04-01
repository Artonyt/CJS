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

// Verificar si se ha enviado un ID de materia a editar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_materia = $_GET['id'];

    // Consulta SQL para obtener los detalles de la materia seleccionada
    $sql = "SELECT * FROM materia WHERE id_materia = $id_materia";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos de la materia
        $row = $result->fetch_assoc();
        $nombre_materia = $row["Nombre_materia"];
        // Otros campos que desees editar

        // Mostrar el formulario de edición
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Materia</title>
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
            <h1>Editar Materia</h1>
            <form action="../guardar_edicion_materia.php" method="post">
                <input type="hidden" name="id_materia" value="<?php echo $id_materia; ?>">
                <label for="nombre">Nombre de la Materia:</label><br>
                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre_materia; ?>"><br>
                <!-- Otros campos que desees editar -->
                <input type="submit" value="Guardar Cambios">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontró la materia a editar.";
    }
} else {
    echo "ID de materia no proporcionado.";
}
$conn->close();
?>
