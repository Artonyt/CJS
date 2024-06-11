<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "Colegio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(array("status" => "error", "message" => "Error de conexión: " . $conn->connect_error)));
}

// Obtener los datos enviados desde el cliente
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(array("status" => "error", "message" => "No se recibieron datos"));
    exit;
}

$response = array();

foreach ($data as $nota) {
    $id_estudiante = $nota['id_estudiante'];
    $nuevo_valor = $nota['nuevo_valor'];

    // Verificar si el valor es numérico
    if (!is_numeric($nuevo_valor)) {
        $response[] = array("id_estudiante" => $id_estudiante, "status" => "error", "message" => "Valor no es numérico");
        continue;
    }

    // Consulta SQL para insertar o actualizar la nota del estudiante
    $sql = "INSERT INTO nota (ID_estudiante, Valor) VALUES ('$id_estudiante', '$nuevo_valor') ON DUPLICATE KEY UPDATE Valor='$nuevo_valor'";

    if ($conn->query($sql) === TRUE) {
        $response[] = array("id_estudiante" => $id_estudiante, "status" => "success");
    } else {
        $response[] = array("id_estudiante" => $id_estudiante, "status" => "error", "message" => $conn->error);
    }
}

$conn->close();

echo json_encode($response);
?>
