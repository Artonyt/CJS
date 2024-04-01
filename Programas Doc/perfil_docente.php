<?php

session_start();

// Verificar si se ha enviado un formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    // Establecer conexión a la base de datos
    include("./conexion.php"); // Asegúrate de que la ruta sea correcta

    // Consultar tabla de docentes
    $consultaDocente = "SELECT * FROM docente WHERE identificacion = '$usuario' AND contraseña = '$password'";
    $resultadoDocente = mysqli_query($link, $consultaDocente);

    // Verificar si se encontró el docente
    if (mysqli_num_rows($resultadoDocente) > 0) {
        // Obtener los datos del docente
        $row = mysqli_fetch_assoc($resultadoDocente);
        $nombreUsuario = $row['Nombre']; 
        $apellidoUsuario = $row['Apellido'];
        $identificacionUsuario = $row['Identificacion'];
        $direccionUsuario = $row['Direccion'];
        $correoUsuario = $row ['Correo'];// Agrega aquí los otros campos que desees mostrar
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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
    <div>
        <a href="">
            <div class="nombre-pagina">
                <img src="../Imagenes/logo (2).png" alt="" width="40%">
            </div>
        </a>  
    </div>

    <nav class="navegacion">
            <ul>
                <li>
                    <a href="perfil_docente.php">
                    <ion-icon name="person-outline"></ion-icon>
                        <span>Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="Asignaturas.php">
                        <ion-icon name="star-outline"></ion-icon>
                        <span>Asignaturas</span>
                    </a>
                </li>
                <li>
                    <a href="Asistencias.php">
                        <ion-icon name="paper-plane-outline"></ion-icon>
                        <span>Asistencias</span>
                    </a>
                </li>

                <li>
                    <a href="cursos.php">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Cursos</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div>
            <div class="linea"></div>

            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Modo Oscuro </span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">
                            
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="usuario">
                <img src="../Imagenes/profile.jpg" alt="">
                <div class="info-usuario">
                    <div class="nombre-email">
                        <span class="nombre"><?php echo $nombreUsuario?></span>
                        <span class="email"><?php echo $correoUsuario?></span>
                        
                    </div>
                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
        </div>

    </div>


    <main>
        <h1>Perfil</h1>
        <span class="nav_image">
            <img src="../Imagenes/profile.jpg"logo_img" width="15%" />
        </span>
        <center><h1>Colegio Codema IED </h1></center>
        <br>
        <br>
        <p>Nombres: <?php echo isset($nombreUsuario) ? $nombreUsuario : 'No disponible'; ?></p>
        <p>Apellidos: <?php echo isset($apellidoUsuario) ? $apellidoUsuario : 'No disponible'; ?></p> 
        <p>Identificación: <?php echo isset($identificacionUsuario) ? $identificacionUsuario : 'No disponible'; ?></p>
        <p>Dirección: <?php echo isset($direccionUsuario) ? $direccionUsuario : 'No disponible'; ?></p>
        <p>Correo electrónico: <?php echo isset($correoUsuario) ? $correoUsuario : 'No disponible'; ?></p>
        <!-- Agrega aquí más campos de información si es necesario -->
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/script.js"></script>
</html>
