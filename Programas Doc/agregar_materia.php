<?php
// Verificamos si se ha enviado el formulario para agregar la materia
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
    $nombreMateria = $_POST["nombre_materia"];

    // Consulta SQL para insertar la nueva materia
    $sql = "INSERT INTO materia (Nombre_materia) VALUES ('$nombreMateria')";

    if ($conn->query($sql) === TRUE) {
        echo "Materia agregada correctamente.";
    } else {
        echo "Error al agregar la materia: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Materia</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../imagenes/favicon.ico" type="image/vnd.microsoft.icon">
</head>
<body>
    <h1>Agregar Materia</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre_materia">Nombre de la materia:</label>
        <input type="text" id="nombre_materia" name="nombre_materia" required>
        <button type="submit">Agregar</button>
    </form>

    <a href="asignaturas.php">Volver a Asignaturas</a>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
