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

// Verificar si se han recibido los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $notasActualizadas = json_decode(file_get_contents('php://input'), true);
    
    foreach ($notasActualizadas as $nota) {
        $idEstudiante = $nota['id_estudiante'];
        $nuevoValor = $nota['nuevo_valor'];

        // Consulta SQL para actualizar el valor de la nota
        $sql = "UPDATE nota SET Valor='$nuevoValor' WHERE ID_estudiante=$idEstudiante";

        if ($conn->query($sql) !== TRUE) {
            echo json_encode(array("success" => false, "message" => "Error al actualizar la nota: " . $conn->error));
            exit();
        }
    }

    // Ahora creamos nuevas notas para los estudiantes que no tienen una nota registrada
    foreach ($notasActualizadas as $nota) {
        $idEstudiante = $nota['id_estudiante'];

        // Verificar si el estudiante ya tiene una nota registrada
        $sqlVerificar = "SELECT * FROM nota WHERE ID_estudiante=$idEstudiante";
        $resultVerificar = $conn->query($sqlVerificar);

        if ($resultVerificar->num_rows == 0) {
            // Si el estudiante no tiene una nota registrada, creamos una nueva
            $sqlCrearNota = "INSERT INTO nota (ID_estudiante, Valor) VALUES ($idEstudiante, 0)";

            if ($conn->query($sqlCrearNota) !== TRUE) {
                echo json_encode(array("success" => false, "message" => "Error al crear una nueva nota para el estudiante: " . $conn->error));
                exit();
            }
        }
    }

    // Si se ejecuta hasta aquí, significa que todas las notas se actualizaron correctamente
    echo json_encode(array("success" => true, "message" => "Cambios guardados correctamente."));
} else {
    // Si no se han recibido datos del formulario, devolver un mensaje de error
    echo json_encode(array("success" => false, "message" => "No se han recibido datos del formulario."));
}

$conn->close();
?>
