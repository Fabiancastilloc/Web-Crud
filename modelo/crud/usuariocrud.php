<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/modelo/entidades/usuario.php';


class UsuarioCrud {
    public static function insertarUsuario($cc, $pass, $nombre, $apellido, $genero, $email) {
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

    public static function eliminarUsuario($cc) {
        $usuario = Usuario::find($cc);
        $usuario->delete();
    }

    public static function listarUsuarios() {
        $usuarios = Usuario::all();
        return $usuarios;
    }

    public static function actualizarUsuario($cc, $pass, $nombre, $apellido, $genero, $email) {
        $usuario = Usuario::find($cc);
        $usuario->pass = $pass;
        $usuario->nombre = $nombre;
        $usuario->apellido = $apellido;
        $usuario->genero = $genero;
        $usuario->email = $email;
        $usuario->save();
        return $usuario;
    }

    public static function consultarUsuario($cc) {
        return Usuario::find($cc);
         //$usuario;
    }

    public static function autenticarUsuario($cc, $pass) {
        $usuario = Usuario::where('cc', $cc)->where('pass', $pass)->first();
        return $usuario;
    }
}
?>
