<?php
session_start();

$usuario = $_POST["usuario"];
$password = $_POST["password"];
$_SESSION["usuario"] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "colegio");

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

$consulta = "SELECT * FROM usuarios WHERE Identificacion = '$usuario' AND Contraseña = '$password'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado);

if ($filas) {
    if ($filas["ID_rol"] == 1) {
        $_SESSION["usuario"] = $usuario;
        header("location: docente.php");
    } elseif ($filas["ID_rol"] == 2) {
        header("location: estudiante.php");
    }
} else {
    $_SESSION['error'] = "Usuario o contraseña incorrectos";
    header("location: index.php");
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
