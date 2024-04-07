<?php
// Define las credenciales de la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'colegio';

// Función para establecer la conexión a la base de datos
function conectar() {
    global $host, $user, $password, $database;
    
    // Intenta establecer la conexión
    $link = mysqli_connect($host, $user, $password, $database);
    
    // Verifica si hubo un error de conexión
    if (!$link) {
        // Si hubo un error, muestra un mensaje de error y termina el script
        die("Error al conectarse al servidor de la base de datos: " . mysqli_connect_error());
    }
    
    // Retorna el enlace a la conexión
    return $link;
}

// Llama a la función para establecer la conexión
$link = conectar();

// Puedes usar $link para realizar consultas a la base de datos

// Una vez que hayas terminado de usar la conexión, ciérrala
mysqli_close($link);
?>
