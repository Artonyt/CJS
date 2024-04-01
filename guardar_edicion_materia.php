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

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han recibido los datos necesarios del formulario
    if (isset($_POST['id_materia']) && isset($_POST['nombre'])) {
        $id_materia = $_POST['id_materia'];
        $nombre_materia = $_POST['nombre'];
        // Otros campos que desees actualizar

        // Consulta SQL para actualizar los datos de la materia
        $sql = "UPDATE materia SET Nombre_materia='$nombre_materia' WHERE id_materia=$id_materia";

        if ($conn->query($sql) === TRUE) {
            // Redirigir a la página de asignaturas.php después de guardar los cambios
            header("Location: Programas Doc/Asignaturas.php");
            exit(); // Asegúrate de detener la ejecución del script después de la redirección
        } else {
            echo "Error al guardar los cambios: " . $conn->error;
        }
    } else {
        echo "No se recibieron todos los datos necesarios del formulario.";
    }
} else {
    echo "No se ha enviado el formulario.";
}

$conn->close();
?>
