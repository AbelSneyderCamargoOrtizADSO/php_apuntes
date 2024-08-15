<?php
require_once("clases/persona.php");

$Nombre1 = "Abel Sneyder";
$Apellido1 = "Sneyder";
$Edad1 = 25;

$Nombre2 = "Carlos HUMBERTO";
$Apellido2 = "CAMARGO";
$Edad2 = 33;

// $persona1 = new Ingeniero($Nombre1, $Apellido1, $Edad1); // INSTANCIAMOS LA CLASE

// $persona1 -> setNombre("ABEL CamarGO");
// $persona1 -> apellido = "Camargo";
// $persona1 -> edad = 19;

// $persona2 = new Medico($Nombre2, $Apellido2, $Edad2); // INSTANCIAMOS LA CLASE

// $persona2 -> nombre = "Carlos";
// $persona2 -> apellido = "Camargo";
// $persona2 -> edad = 33;

$persona1 = new Medico;
$persona1->setApellidos("Ortiz", "Camargo");

var_dump($persona1);
// var_dump($persona2);


?>


<div>
    <h1>Persona 1</h1>
    <p>Nombre: <?php echo $persona1->getNombre(); ?></p>

    <h1>Persona 2</h1>
    <p>Nombre: <?php echo $persona1->getApellido()?></p>
</div>