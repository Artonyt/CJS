<?php
session_start();

$error = ""; // Variable para almacenar el mensaje de error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    // Establecer conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "colegio");

    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Consultar tabla de estudiantes
    $consultaEstudiante = "SELECT * FROM estudiante WHERE identificacion = '$usuario' AND contraseña = '$password'";
    $resultadoEstudiante = mysqli_query($conexion, $consultaEstudiante);

    // Consultar tabla de docentes
    $consultaDocente = "SELECT * FROM docente WHERE identificacion = '$usuario' AND contraseña = '$password'";
    $resultadoDocente = mysqli_query($conexion, $consultaDocente);

    // Verificar si se encontró el estudiante
    if (mysqli_num_rows($resultadoEstudiante) > 0) {
        $_SESSION["usuario"] = $usuario;
        $_SESSION["Nombre_rol"] = "Estudiante";
        header("Location: Programas/perfil_estudiante.php");
        exit();
    } elseif (mysqli_num_rows($resultadoDocente) > 0) { // Verificar si se encontró el docente
        $_SESSION["usuario"] = $usuario;
        $_SESSION["Nombre_rol"] = "Docente";
        header("Location: Programas/perfil_docente.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
        $_SESSION["error"] = $error; // Almacenar el mensaje de error en la sesión
        header("Location: index.php");
        exit();
    }

    mysqli_close($conexion);
}
?>
