<?php

namespace app\Controllers;

use app\Models\Usuario;

class HomeController extends Controller{
    public function index(){

        $usuarioModel = new Usuario();

        // return $usuarioModel -> all();
        // return $usuarioModel -> find(3);
        // return $usuarioModel -> create([
        //     "nombre" => "AbelitoSIU",
        //     "apellido" => "Garcia",
        //     "email" => "abelitosiu@gmail.com",
        // ]);
        // return $usuarioModel -> update(9, [
        //     "nombre" => "AbelitoSIU jeje",
        //     "apellido" => "Garcia jeje",
        //     "email" => "abelitosiuJEJE@gmail.com",
        // ]);


        return $usuarioModel -> delete(7);

        return $this -> view("home", [
            "title" => "Home",
            "message" => "Welcome to my website"
        ]);
    }
}

?>