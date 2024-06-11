<?php
// Conexión a la base de datos
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

// Verificar si se ha enviado el formulario de registro de asistencia
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $estudiante_id = $_POST["estudiante_id"];
    $asignatura_id = $_POST["asignatura_id"];
    $fecha_asistencia = $_POST["trip-start"]; // Ajustar según el nombre del campo de fecha en el formulario
    $tipo = $_POST["asistencia"];

    // Preparar la consulta SQL para insertar la asistencia
    $sql = "INSERT INTO asistencia (ID_estudiante, ID_asignatura, Fecha_asistencia, Tipo) 
            VALUES (?, ?, ?, ?)";
    
    // Preparar la declaración SQL
    $stmt = $conn->prepare($sql);
    
    // Vincular los parámetros y ejecutar la consulta
    $stmt->bind_param("iiss", $estudiante_id, $asignatura_id, $fecha_asistencia, $tipo);
    $stmt->execute();

    // Verificar si la consulta se ejecutó correctamente
    if ($stmt->affected_rows > 0) {
        echo "Asistencia registrada exitosamente.";
    } else {
        echo "Error al registrar la asistencia.";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>