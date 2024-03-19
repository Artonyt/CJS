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
  if (!empty($_GET['alerta'])) {
      if ($_GET['alerta'] == 1) {
          echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-times-circle'></i> ¡Error al ingresar!</h4>
                Documento o clave incorrectos. Por favor, verifique e intente nuevamente.
                </div>";
      } elseif ($_GET['alerta'] == 2) {
          echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check-circle'></i> ¡Éxito!</h4>
                ¡Ha cerrado sesión exitosamente!
                </div>";
      }
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
    <a href="registro.php">Registrarse</a>
  </form>
</div>

<script src="js/Validacion.js"></script>

</body>
</html>
