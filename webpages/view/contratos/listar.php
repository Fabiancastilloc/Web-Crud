<!DOCTYPE html>
<html>
<head>
	<title>Lista de Contratos</title>
	<link rel="stylesheet" type="text/css" href="../../css/listarC.css">
</head>
<body>
<div class="container">
	<h1>Lista de Contratos</h1>
<table>
	<tr>
		<th>ID</th>
		<th>Fecha de Firma</th>
		<th>Fecha de Inicio</th>
		<th>Fecha de Fin</th>
		<th>Empresa</th>
		<th>Empleado</th>
		<th>Funciones</th>
		<th>Monto</th>
		<th>Frecuencia de Pago</th>
		<th>Acciones</th>
	</tr>

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

	$sql = "SELECT * FROM Contratos";

	$resultado = $conn->query($sql);

	if ($resultado->num_rows > 0) {
		while($fila = $resultado->fetch_assoc()) {
			echo "<tr>
			<td>".$fila["id"]."</td>
			<td>".$fila["fechaFirma"]."</td>
			<td>".$fila["fechaInicio"]."</td>
			<td>".$fila["fechaFin"]."</td>
			<td>".$fila["empresa"]."</td>
			<td>".$fila["empleado"]."</td>
			<td>".$fila["funciones"]."</td>
			<td>".$fila["monto"]."</td>
			<td>".$fila["frecuenciaDePago"]."</td>
			<td>
				<a href='eliminar.php?id=".$fila["id"]."' class='eliminar'>Eliminar</a>
			</td>
			</tr>";
		}
	} else {
		echo "<tr><td colspan='10'>No se encontraron contratos</td></tr>";
	}

	$conn->close();
	?>

</table>
<a href="../index.php" class="volver">Volver a Inicio</a>
</div>
</body>
</html>