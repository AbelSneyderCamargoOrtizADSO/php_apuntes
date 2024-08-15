<?php

class miClase{
    public $publica = "Publica";
    protected $protegida = "Protegida"; // SOLO PUEDE SER ACCEDIDO DESDE LA PROPIA CLASE Y DESDE LAS CLASES HIJAS
    private $privada = "Privada"; // SOLO PUEDE SER ACCEDIDO DESDE LA PROPIA CLASE O CLASE PADRE

    function imprimir(){ // SOLO SE PUEDE ACCEDER A UNA VARIABLE PUBLICA O PRIVADA POR MEDIO DE LOS METODOS
        echo $this->publica . "\n";
        echo $this->protegida . "\n";
        echo $this->privada . "\n";
    }
}

class miClase2 extends miClase{
    function imprimir(){ 
        echo $this->publica . "\n";
        echo $this->protegida . "\n";
        // echo $this->privada . "\n";
    }
}


$objeto = new miClase();

echo $objeto -> publica;
echo $objeto -> imprimir();

?>