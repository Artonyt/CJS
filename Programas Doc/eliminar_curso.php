<?php
// Verifica si se ha recibido el ID del curso a eliminar
if(isset($_POST['id_curso'])) {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Colegio";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // ID del curso a eliminar
    $id_curso = $_POST['id_curso'];

    // Consulta SQL para eliminar el curso
    $sql = "DELETE FROM curso WHERE id_curso = $id_curso";

    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        header("Location: cursos.php");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error al eliminar el curso: " . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
} else {
    echo "No se recibió el ID del curso a eliminar.";
}
?>
