<?php

require_once "UsuarioClass.php";
require_once "conexion.php";


class UsuarioDAO{

    private $conex;

    public function __construct($conex)
    {
        $this -> conex = $conex;
    }

    public function regUsuario(Usuario $usuario){
        $query = "INSERT INTO tb_usuarios (nombre, apellido, email) VALUES (?, ?, ?)";

        $stmt = $this -> conex -> prepare($query);

        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $email = $usuario->getEmail();
        
        $stmt -> bind_param("sss", $nombre, $apellido, $email);
        
        if ($stmt -> execute()) {
            echo "USUARIO REGISTRADO EXITOSAMENTE";
        } else {
            echo "ERROR AL REGISTRAR USUARIO";
        }
        
        $stmt -> close();

    }

    // LA CONEXION SOLO SE CIERRA EN EL CONTROLADOR

}

?>