<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="css/master.css">
</head>
<body>

<div class="login-box">
  <img src="img/logo.png" class="avatar" alt="Avatar Image">
  <h1>Iniciar Sesión</h1>

  <?php
  session_start();

  // Verificar si hay un mensaje de error en la sesión
  if (isset($_SESSION["error"])) {
      $error = $_SESSION["error"];
      // Mostrar el mensaje de error
      echo '<p style="color: red;">' . $error . '</p>';
      // Limpiar la sesión del mensaje de error para evitar que se muestre de nuevo después de una recarga de la página
      unset($_SESSION["error"]);
  }
  ?> 

  <form id="login-form" action="validar.php" method="post">
    <div>
      <label for="usuario">Documento</label>
      <input type="text" id="usuario" name="usuario" placeholder="Identificación">
      <div id="usuario-error" class="error-message"></div>
    </div>

    <div>
      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password" placeholder="Contraseña">
      <div id="password-error" class="error-message"></div>
    </div>

    <input type="submit" value="Ingresar">
    <a href="recuperar_contrasena.php">¿Olvidó su contraseña?</a><br>
  </form>
</div>

<script src="js/Validacion.js"></script>

</body>
</html>
