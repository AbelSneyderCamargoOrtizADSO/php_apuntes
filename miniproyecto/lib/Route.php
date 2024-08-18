<?php

namespace lib; // EL NAMESPACE DEBE SER EL NMOBRE DE LA CARPETA Y LA CLASE EL NOMBRE DEL ARCHIVO

class Route
{
    private static $routes = [];

    public static function get($uri, $callback){
        $uri = trim($uri, "/"); // PARA QUE NO TOME EL / AL INICIO EN LAS RUTAS
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post($uri, $callback){
        $uri = trim($uri, "/");
        self::$routes['POST'][$uri] = $callback;
    }

    public static function dispatch() {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, "/");

        $method = $_SERVER['REQUEST_METHOD'];

        foreach(self::$routes[$method] as $route => $callback){

            if (strpos($route, ":") !== false) { // PARA OBTENER LA VARIABLE
                $route = preg_replace("#:[a-zA-z]+#", "([a-zA-z]+)", $route);
            }

            if (preg_match("#^$route$#", $uri, $matches)) { // EN MARCHES SE ALMACENA LA VARIABLE ENVIADA POR URL EL (SLUG)
            
                $params = array_slice($matches, 1);

                // $response = $callback(...$params);

                if (is_callable($callback)) {
                    $response = $callback(...$params);
                }

                if (is_array($callback)) {
                    $controller = new $callback[0];
                    $response = $controller -> {$callback[1]}(...$params);
                }

                if (is_array($response) || is_object($response) ) {
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else {
                    echo $response;
                }

                return;
            }

        }

        echo "404 NOT FOUND BRO";
    }

}
