<?php

namespace app\Models;

class Usuario extends Model {
    // EN CASO DE QUE EL MODELO ESTE EN OTRA BASE DE DATOS CAMBIO LOS DATOS DESDE CADA MODELO
    // protected $host = HOST;
    // protected $user = USER;
    // protected $pass = PASS;
    // protected $db_name = DB_NAME;
    
    protected $table =  "tb_usuarios";
}

?>