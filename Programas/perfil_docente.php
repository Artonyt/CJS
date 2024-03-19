<?php
session_start();

// Verificar si se ha enviado un formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    // Establecer conexión a la base de datos
    include("conexion.php"); // Asegúrate de que la ruta sea correcta

    // Consultar tabla de docentes
    $consultaDocente = "SELECT * FROM docente WHERE identificacion = '$usuario' AND contraseña = '$password'";
    $resultadoDocente = mysqli_query($link, $consultaDocente);

    // Verificar si se encontró el docente
    if (mysqli_num_rows($resultadoDocente) > 0) {
        // Obtener los datos del docente
        $row = mysqli_fetch_assoc($resultadoDocente);
        $nombreDocente = $row['NOMBRES'];
        // Agrega aquí los otros campos que desees mostrar
    } else {
        $error = "Usuario o contraseña incorrectos"; // Asignar el mensaje de error
    }

    mysqli_close($link); // Cerrar la conexión a la base de datos
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CJS</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <img src="../Imagenes/logo (2).png" alt="" width="30%">
                <span>CJS</span>
            </div>
           
        </div>

        <!-- Navegación, menú lateral, etc. -->

    </div>

    <main>
        <h1>Perfil</h1>
        <span class="nav_image">
            <img src="../Imagenes/profile.jpg" logo_img" width="15%" />
          </span>
          <center><h1>Colegio Codema IED </h1></center>
        <br>
        <br>

        <?php if (isset($error)) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php else : ?>
            <p>Nombres: <?php echo $nombreDocente; ?></p>
            <!-- Agrega aquí los otros campos que desees mostrar -->
        <?php endif; ?>
    </main>

    <!-- Scripts, archivos JS, etc. -->

</body>
</html>

