<?php

require_once "../Modelo/conexion.php";
require_once "../Modelo/UsuarioClass.php";
require_once "../Modelo/UsuarioDAO.php";

if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["email"])) {
    echo "Todos los campos son obligatorios.";
    exit;  
}

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];

try {
    $conex = new Conexion();
    $conex -> conectar();
    $conexion = $conex -> getConexion();

    $usuario = new Usuario($nombre, $apellido, $email);

    $usuarioDAO = new UsuarioDAO($conexion);
    $usuarioDAO -> regUsuario($usuario);

    echo "Usuario registrado exitosamente.";

} catch (Exception $error) {
    echo "Hubo un error al registrar el usuario: " . $error->getMessage();
} finally {
    $conex->cerrarConexion();
}

?>