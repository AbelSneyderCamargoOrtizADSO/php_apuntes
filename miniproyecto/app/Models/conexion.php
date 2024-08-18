<?php

class Conexion {
    private $host;
    private $user;
    private $pass;
    private $data_base;

    private $conex;

    public function __construct($host = "localhost", $user = "root", $pass = "", $data_base = "practica_php"){
        $this -> host = $host;
        $this -> user = $user;
        $this -> pass = $pass;
        $this -> data_base = $data_base;
    }
    
    public function conectar(){
        $this->conex = new mysqli($this->host, $this->user, $this->pass, $this->data_base);

        if ($this -> conex -> connect_error) {
            die("Error de conexión: " . $this -> conex -> connect_error);
        } else {
            echo "CONEXION EXITOSA ";
        }
    }

    public function getConexion() {
        return $this -> conex;
    }

    public function cerrarConexion() {
        if ($this -> conex) {
            $this -> conex -> close();
        }
    }
}

?>