<?php
// Verifica si se ha recibido el ID de la materia a eliminar
if(isset($_POST['id_materia'])) {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Colegio";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // ID de la materia a eliminar
    $id_materia = $_POST['id_materia'];

    // Consulta SQL para eliminar la materia
    $sql = "DELETE FROM materia WHERE id_materia = $id_materia";

    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        header("Location: Asignaturas.php");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error al eliminar la materia: " . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
} else {
    echo "No se recibió el ID de la materia a eliminar.";
}
?>
