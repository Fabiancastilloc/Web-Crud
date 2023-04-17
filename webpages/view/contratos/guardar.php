<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbactividad";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = $_POST['id'];
$fechaFirma = $_POST['fechaFirma'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFin'];
$empresa = $_POST['empresa'];
$empleado = $_POST['empleado'];
$funciones = $_POST['funciones'];
$monto = $_POST['monto'];
$frecuenciaDePago = $_POST['frecuenciaDePago'];

if (isset($_POST['usuarioscc'])) {
    $usuarioscc = $_POST['usuarioscc'];
} else {
    $usuarioscc = "";
}

// Verificar que el usuario existe antes de actualizar el contrato
$sql_check = "SELECT * FROM usuarios WHERE cc='$usuarioscc'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    // El usuario existe, así que podemos actualizar el contrato
    $sql = "UPDATE Contratos SET fechaFirma='$fechaFirma', fechaInicio='$fechaInicio', fechaFin='$fechaFin', empresa='$empresa', empleado='$empleado', funciones='$funciones', monto='$monto', frecuenciaDePago='$frecuenciaDePago', usuarioscc='$usuarioscc' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: consultar.php");
        echo "Contrato actualizado correctamente";
    } else {
        echo "Error al actualizar el contrato: " . $conn->error;
    }
} else {
    // El usuario no existe, así que no podemos actualizar el contrato
    echo "El usuario con cc='$usuarioscc' no existe";
}

$conn->close();
?>
