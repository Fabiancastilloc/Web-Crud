<!DOCTYPE html>
<html>
<head>
    <title>Listado de usuarios</title>
    <link rel="stylesheet" href="../../css/ListarU">
</head>
<body>
    <h1>Listado de usuarios</h1>
    <table>
        <tr>
            <th>Cédula</th>
            <th>Clave</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Género</th>
            <th>Email</th>

        </tr>
        <?php
        require_once '../../../controlador/usuariocontrolador.php';
        $crud = new UsuarioCrud();
        $usuarios = $crud->listarUsuarios();
        foreach($usuarios as $usuario) {
            echo '<tr>';
            echo '<td>'.$usuario->cc.'</td>';
            echo '<td>'.$usuario->pass.'</td>';
            echo '<td>'.$usuario->nombre.'</td>';
            echo '<td>'.$usuario->apellido.'</td>';
            echo '<td>'.$usuario->genero.'</td>';
            echo '<td>'.$usuario->email.'</td>';
    
        }
        ?>
    </table>
</body>
</html>
