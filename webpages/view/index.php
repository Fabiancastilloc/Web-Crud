<?php
session_start();
$loggedIn = false;

// Si el usuario está logueado, cambiar el valor de $loggedIn a true
if (isset($_SESSION['cc'])) {
    $loggedIn = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Página de inicio</title>
    <link rel="stylesheet" href="../css/inicio.css">
<body>
    <div class="container">
        <h1>Bienvenido</h1>

        <?php if ($loggedIn): ?>
            <!-- Mostrar los enlaces a los archivos de la carpeta contratos solo si el usuario ha iniciado sesión -->
            <h2>Contenido</h2>
            <ul>
                <li><a href="contratos/agregar.php">Agregar contrato</a></li>
                <li><a href="contratos/editar.php">Editar contrato</a></li>
                <li><a href="contratos/consultar.php">Consultar contrato</a></li>
                <li><a href="contratos/listar.php">Listar contratos</a></li>
                <li><a href="usuarios/listar.php">Usuarios</a></li>
                <li><a class="logout" href="/webpages/view/usuarios/cerrasesion.php">Cerrar sesión</a></li>
            </ul>
        <?php else: ?>
            <!-- Mostrar los enlaces a los archivos de la carpeta usuarios si el usuario no ha iniciado sesión -->
            <h2>Contenido</h2>
            <ul>
                <li><a href="/webpages/view/usuarios/login.php">Iniciar sesión</a></li>
                <li><a href="usuarios/registrar.php">Registrar</a></li>
            </ul>
        <?php endif; ?>

        <img src="../imagenes/1.jpg" alt="Imagen de fondo">
    </div>
</body>
</html>
