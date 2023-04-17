<!DOCTYPE html>
<html>
  <head>
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="../../css/registarUsuario.css">
  </head>
  <body>
    <div class="container">
      <h1>Registro de usuario</h1>

      <form action="../../../controlador/usuariocontrolador.php" method="post">
        <label for="cc">Cédula:</label>
        <input type="number" name="cc" required><br><br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" required><br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br><br>
        <label for="genero">Género:</label>
        <select name="genero" required>
          <option value="">Seleccione una opción</option>
          <option value="M">Masculino</option>
          <option value="F">Femenino</option>
          <option value="O">Otro</option>
        </select><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Registrar">
      </form>
      <center>
        <br>
      <div class="button-container">
        <a href="../index.php" class="button">Inicio</a>
        <a href="login.php" class="button">Login</a>
        <br/>
      </div>
      </center>
      <?php
      if(isset($_GET['mensaje'])) {
        echo '<p>'.$_GET['mensaje'].'</p>';
      }
      ?>
    </div>
  </body>
</html>
