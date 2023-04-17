<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/modelo/entidades/usuario.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/modelo/crud/usuariocrud.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cc = $_POST['cc'];
    $pass = $_POST['pass'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['genero'];
    $email = $_POST['email'];

    $crud = new UsuarioCrud();
    $usuario = $crud->insertarUsuario($cc, $pass, $nombre, $apellido, $genero, $email);

    if($usuario) {
        header('Location: ../webpages/view/usuarios/registrar.php?mensaje=Usuario registrado correctamente');
    } else {
        header('Location: ../webpages/view/usuarios/registrar.php?mensaje=Error al registrar el usuario');
    }
    
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $crud = new UsuarioCrud();
    $usuarios = $crud->listarUsuarios();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['cc'])) {
        $cc = $_GET['cc'];
        $crud = new UsuarioCrud();
        $crud->eliminarUsuario($cc);
     } 


}


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cc = $_POST['cc'];
    $pass = $_POST['pass'];

    $crud = new UsuarioCrud();
    $usuario = $crud->autenticarUsuario($cc, $pass);

    if($usuario) {
        // Iniciar sesión o guardar la información de sesión aquí
        header('Location: ../webpages/view/usuario/index.php');
    } else {
        header('Location: ../webpages/view/usuario/login.php?mensaje=Error: Usuario o contraseña incorrectos');
    }

}
?>