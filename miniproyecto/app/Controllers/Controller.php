<?php

namespace app\Controllers;

class Controller{
    public function view($route, $data = []){

        // DESTRUCTURAR ARRAY

        extract($data);
        
        // return $title;

        if (file_exists("../resources/views/{$route}.php")) {

            ob_start();
            include "../resources/views/{$route}.php";
            $content = ob_get_clean();

            return $content;

        } else {
            return "EL ARCHIVO NO EXISTE";
        }
    }
}

?>