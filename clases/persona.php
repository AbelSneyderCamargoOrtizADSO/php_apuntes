<?php

class Persona
{
    public $nombre;
    public $apellido1, $apellido2;
    public $edad;

    // public function __construct($nombre, $apellido, $edad){
    //     $this -> nombre = strtolower($nombre);
    //     $this -> apellido = strtolower($apellido);
    //     $this -> edad = $edad;
    // }

    public function setNombre($nombre){
        $this -> nombre = strtolower($nombre);
    }

    public function getNombre(){
        return ucwords( $this -> nombre);
    }

    public function setApellidos($apellido1, $apellido2){
        $this -> apellido1 = $apellido1;
        $this -> apellido2 = $apellido2;
    }

    public function getApellido(){
        return $this -> apellido1 . " " . $this -> apellido2;
    }

}

class Medico extends Persona  {
    public $especialidad;

    // EXTENDER METODO
    public function setApellidos($apellido1, $apellido2){
        parent::setApellidos($apellido1, $apellido2);

        echo "APELLIDOS ASIGNADOS EXITOSAMENTE AL MEDICO";
    }

}

class Ingeniero extends Persona {
    public $numProgramas;

    // SOBREESCRIBIR METODO
    public function setApellidos($apellido1, $apellido2){
        $this -> apellido1 = $apellido2;
        $this -> apellido2 = $apellido1;
    }

}



?>