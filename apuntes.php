<?php

declare(strict_types=1); // PARA QUE VERIFIQUE EL TIPO DE DATO CUANDO LO DECLARAMOS

$nombre = "Abel";
$age = 19 + "1"; // DEBILMENTE TIPADO

$age2 = 19 . "1"; // CONCATENA CON .

var_dump($nombre); // SABER INFORMACION DE VARIABLE

gettype($age); // TIPO DE DATO

$transform = (int) "19"; // CAMBIAR TIPO DE DATO

$frase = "<br> Parte 1 de frase";
$frase .= " Parte 2 de frase"; // CONCATENAR CADENAS

// CONSTANTES
define("edad", 19);
const edad2 = 19;

// BOOLEANOS
$verdadero = !18 < $age;

if (is_string($nombre)) {
    echo " <br> Es una cadena de texto";
} else {
    echo "No es una cadena de texto";
}

// OPERADOR TERNARIO
$edad = 19;
$edadMayor = $edad > 18 ? "Es mayor de edad" : "Es menor";


// MATCH (EL SWITCH) GUARDA EL VALOR RETORNADA EN VARIABLE
$edad = 18;

// $edadMayor = match ($edad) {
//     0, 1 => "Es un bebe",
//     18 => "Es mayor de edad",
//     default => "Es un adulto"
// };

$edadMayor = match (true) {
    $edad < 18 => "Es menor de edad",
    $edad === 18 => "Es mayor de edad",
    $edad < 50 => "Eres UN ADULTO",
    default => "Es un adulto mayor"
};

// arrays
$frutas = ["manzana", "pera", "naranja"];
$frutas[] = "fresa";
$frutas[] = "uva";

echo "$edadMayor";

$person = [
    "nombre" => "Juan",
    "edad" => 19,
    "direccion" => "calle 123"
];

// TIPADO GRADUAL
?>

<h2><?= $frutas[0] ?></h2>

<ul>
    <?php foreach ($frutas as $indice => $fruta) : ?>
        <li><?= $indice . " " . $fruta ?></li>
    <?php endforeach; ?>
</ul>


<?php

// APIS
$api = curl_init("https://jsonplaceholder.typicode.com/posts");
curl_setopt($api, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($api);
$data = json_decode($response, true);

curl_close($api);

// FUNCIONES
// SOLO PARA UN GET (LLAMADA A API MAS RAPIDA)
function get_datos(String $url)
{
    $result = file_get_contents($url);
    $data2 = json_decode($result, true);

    return $data2;
};

$data2 = get_datos("https://jsonplaceholder.typicode.com/posts");

// var_dump($data);

// IMPORTACIONES

// require(); // REQUERIRLO MULTIPLES VECES
// require_once(); // REQUERIRLO SOLO UNA VEZ
// include(); 
// include_once(); 

// array_merge para fucionar o agregarle algo a un array
// array_push para agregar un elemento a un array
// array_pop para eliminar el ultimo elemento de un array
// array_shift para eliminar el primer elemento de un array 
// array_unshift para agregar un elemento al inicio de un array

// INCLUDE - SI NO ENCUENTA UN ARCHIVO SOLO DA UN WARNING Y SIGUE EJECUTANDO 


?>

<section style="display: flex; gap: 10px; flex-wrap: wrap; justify-content: center;">
    <?php foreach ($data2 as $indice => $post) : ?>
        <div style="width: 200px; background-color: lightgreen; border-radius: 10px; padding: 10px;">
            <h2><?= $post["title"] ?></h2>
            <p><?= $post["body"] ?></p>
        </div>
    <?php endforeach; ?>
</section>