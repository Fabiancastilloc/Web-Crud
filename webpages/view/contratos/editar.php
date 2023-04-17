<!DOCTYPE html>
<html>
<head>
	<title>Editar Contrato</title>
	<link rel="stylesheet" href="../../css/editar.css">
</head>
<body>

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

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	header("Location: consultar.php");
}

$sql = "SELECT * FROM Contratos WHERE id=$id";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 1) {
	$fila = $resultado->fetch_assoc();
} else {
	header("Location: consultar.php");
}

$conn->close();
?>

<h2>Editar Contrato</h2>

<form method="post" action="guardar.php">
	<input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
	<label for="fechaFirma">Fecha de Firma:</label>
	<input type="date" id="fechaFirma" name="fechaFirma" value="<?php echo $fila['fechaFirma']; ?>">

	<label for="fechaInicio">Fecha de Inicio:</label>
	<input type="date" id="fechaInicio" name="fechaInicio" value="<?php echo $fila['fechaInicio']; ?>">

	<label for="fechaFin">Fecha de Fin:</label>
	<input type="date" id="fechaFin" name="fechaFin" value="<?php echo $fila['fechaFin']; ?>">

	<label for="empresa">Empresa:</label>
	<input type="text" id="empresa" name="empresa" value="<?php echo $fila['empresa']; ?>">

	<label for="empleado">Empleado:</label>
	<input type="text" id="empleado" name="empleado" value="<?php echo $fila['empleado']; ?>">

	<label for="funciones">Funciones:</label>
	<input type="text" id="funciones" name="funciones" value="<?php echo $fila['funciones']; ?>">
    <label for="monto">Monto:</label>
    <input type="number" id="monto" name="monto" value="<?php echo $fila['monto']; ?>">

    <label for="frecuenciaDePago">Frecuencia de Pago:</label>
    <input type="text" id="frecuenciaDePago" name="frecuenciaDePago" value="<?php echo $fila['frecuenciaDePago']; ?>">

    <label for="usuarioscc">Usuario CC:</label>
    <input type="decimal" name="usuarioscc" value="<?php echo $fila['usuarioscc']; ?>">
<input type="submit" value="Guardar">
</form>
</body>
</html>
