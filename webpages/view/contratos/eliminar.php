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

$id = $_GET['id'];

$sql = "DELETE FROM Contratos WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "El contrato ha sido eliminado exitosamente";
} else {
    echo "Error al eliminar el contrato: " . $conn->error;
}

$conn->close();
?>

<p><a href="listar.php">Volver a la lista de contratos</a></p>

<!DOCTYPE html>
<html>
<head>
	<title>Eliminar Contrato</title>
	<style>
		p {
			margin-top: 20px;
		}

		a {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			text-decoration: none;
			border-radius: 4px;
		}

		a:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>