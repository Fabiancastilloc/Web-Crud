<!DOCTYPE html>
<html>
<head>
	<title>Consultar Contratos</title>
	<link rel="stylesheet" href="../../css/consultar.css">
</head>
<body>

	<div class="container">

		<h2>Consultar Contratos</h2>

		<form method="get" action="">
			<label for="buscador">Buscar contrato:</label>
			<input type="text" id="buscador" name="buscador" placeholder="Buscar contrato por empresa o empleado...">
			<input type="submit" value="Buscar">
		</form>

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

		// Buscador
		if (isset($_GET['buscador'])) {
			$buscar = $_GET['buscador'];

			$sql = "SELECT * FROM Contratos WHERE empresa LIKE '%$buscar%' OR empleado LIKE '%$buscar%'";
		} else {
			$sql = "SELECT * FROM Contratos";
		}

		$resultado = $conn->query($sql);

		if ($resultado->num_rows > 0) {
		    echo "<table>
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
		    </tr>";

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
		        	<a href='editar.php?id=".$fila["id"]."'>Editar</a> |
					<form method='post' action='eliminar.php'>
		    	<input type='hidden' name='id' value='".$fila["id"]."'>
		    	<button type='submit' class='eliminar-btn'>Eliminar</button>
		    </form>
		    </td>
		    </tr>";
		}
		echo "</table>";
		} else {
		echo "No se encontraron contratos.";
		}

		$conn->close();
		?>

	</div>
	<center>
	<a href="../index.php">Ir a Inicio</a>

	</center>
	

</body>
</html>
