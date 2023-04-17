<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/modelo/crud/usuariocrud.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modelo/entidades/usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modelo/entidades/contratos.php';

class UsuarioCrud {
    public function insertarUsuario($cc, $pass, $nombre, $apellido, $genero, $email) {
        $usuario = new Usuario();
        $usuario->cc = $cc;
        $usuario->pass = $pass;
        $usuario->nombre = $nombre;
        $usuario->apellido = $apellido;
        $usuario->genero = $genero;
        $usuario->email = $email;
        $usuario->save();
        return $usuario;
    }

    public function eliminarUsuario($cc) {
        $usuario = Usuario::find($cc);
        $usuario->delete();
    }

    public function listarUsuarios() {
        $usuarios = Usuario::all();
        return $usuarios;
    }

    public function actualizarUsuario($cc, $pass, $nombre, $apellido, $genero, $email) {
        $usuario = Usuario::find($cc);
        $usuario->pass = $pass;
        $usuario->nombre = $nombre;
        $usuario->apellido = $apellido;
        $usuario->genero = $genero;
        $usuario->email = $email;
        $usuario->save();
        return $usuario;
    }

    public function consultarUsuario($cc) {
        $usuario = Usuario::find($cc);
        return $usuario;
    }
}

?>


