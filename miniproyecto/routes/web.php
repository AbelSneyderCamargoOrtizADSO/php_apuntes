<?php
use lib\Route;
use app\Controllers\HomeController;

// AGREGAR LAS RUTAS EN ORDEN

Route::get( "/", [HomeController::class, "index"]);

Route::get( "/contact", function() {
    return "HOLA MUNDO desde contact";
});

Route::get( "/about", function() {
    return "HOLA MUNDO desde about";
});

Route::get( "/cursos/:slug", function($slug) {
    return "EL CURSO ES " . $slug;
});


Route::dispatch();

?>