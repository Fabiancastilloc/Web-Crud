<?php
require_once '../../../controlador/contratoscontrolador.php'
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registro de contratos</title>
    <link rel="stylesheet" href="../../css/registrar.css">
  </head>
  <body>
    <div class="container">
      <h1>Registro de contratos</h1>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Fecha de firma:</label>
        <input type="date" name="fechaFirma" required><br>

        <label>Fecha de inicio:</label>
        <input type="date" name="fechaInicio" required><br>

        <label>Fecha de fin:</label>
        <input type="date" name="fechaFin" required><br>

        <label>Empresa:</label>
        <input type="text" name="empresa" required><br>

        <label>Empleado:</label>
        <input type="text" name="empleado" required><br>

        <label>Funciones:</label>
        <input type="text" name="funciones" required><br>

        <label>Monto:</label>
        <input type="number" name="monto" required><br>

        <label>Frecuencia de pago:</label>
        <input type="text" name="frecuenciaDePago" required><br>

        <label>Usuario CC:</label>
        <input type="number" name="usuarioscc" required><br>

        <input type="submit" value="Registrar contrato">
      </form>
      <p> Regresar a <a href="../index.php">Inicio</a>.</p>
    </div>
  </body>
</html>
