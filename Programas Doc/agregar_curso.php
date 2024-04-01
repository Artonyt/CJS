<?php
// Verificamos si se ha enviado el formulario para agregar el curso
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Colegio";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Recibimos los datos del formulario
    $nombreCurso = $_POST["nombre_curso"];
    $idGrado = $_POST["id_grado"];

    // Consulta SQL para insertar el nuevo curso
    $sql = "INSERT INTO curso (nombre_curso, id_grado) VALUES ('$nombreCurso', '$idGrado')";

    if ($conn->query($sql) === TRUE) {
        echo "Curso agregado correctamente.";
    } else {
        echo "Error al agregar el curso: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Curso</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Agregar Curso</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre_curso">Nombre del curso:</label>
        <input type="text" id="nombre_curso" name="nombre_curso" required>
        
        <label for="id_grado">ID del grado:</label>
        <input type="text" id="id_grado" name="id_grado" required>
        
        <button type="submit">Agregar</button>
    </form>

    <a href="cursos.php">Volver a Cursos</a>
</body>
</html>
