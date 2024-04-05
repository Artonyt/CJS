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
// Verificar si se proporciona un id_curso en la URL
if(isset($_GET['id_curso'])) {
    $id_curso = $_GET['id_curso'];

    // Consulta SQL para obtener los estudiantes asociados a ese curso
    $sql = "SELECT * FROM estudiante WHERE id_curso = $id_curso";
    $result = $conn->query($sql);

    // Inicializar un array para almacenar los datos de los estudiantes
    $estudiante = array();

    // Obtener los datos de los estudiantes y guardarlos en el array
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $estudiante[] = $row;
        }
    } else {
        echo "No se encontraron estudiantes para este curso.";
        exit; // Salir del script si no hay estudiantes para este curso
    }

    // Redirigir a Notas.php con los datos de los estudiantes
    header("Location: Notas.php?id_curso=$id_curso&estudiante=" . urlencode(serialize($estudiante)));
    exit;
} else {
    echo "No se proporcionó un id_curso válido en la URL.";
    exit; // Salir del script si no se proporcionó un id_curso válido
}
?>