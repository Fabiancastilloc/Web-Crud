<?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbactividad";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar si la conexión a la base de datos es exitosa
    if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Obtener los valores del formulario de registro de contrato
      $fechaFirma = $_POST['fechaFirma'];
      $fechaInicio = $_POST['fechaInicio'];
      $fechaFin = $_POST['fechaFin'];
      $empresa = $_POST['empresa'];
      $empleado = $_POST['empleado'];
      $funciones = $_POST['funciones'];
      $monto = $_POST['monto'];
      $frecuenciaDePago = $_POST['frecuenciaDePago'];
      $usuarioscc = $_POST['usuarioscc'];

      // Verificar si el valor de "usuariocc" es una llave foránea válida
      $sql_check = "SELECT cc FROM Usuarios WHERE cc = $usuarioscc";
      $result = $conn->query($sql_check);

      if ($result->num_rows > 0) {
        // Insertar los valores en la tabla "Contratos"
        $sql = "INSERT INTO Contratos (fechaFirma, fechaInicio, fechaFin, empresa, empleado, funciones, monto, frecuenciaDePago, usuarioscc)
        VALUES ('$fechaFirma', '$fechaInicio', '$fechaFin', '$empresa', '$empleado', '$funciones', $monto, '$frecuenciaDePago', $usuarioscc)";

    if ($conn->query($sql) === TRUE) {
        echo "El contrato ha sido registrado exitosamente.";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
       } else {
      echo "Error: El usuario con CC $usuarioscc no existe.";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
