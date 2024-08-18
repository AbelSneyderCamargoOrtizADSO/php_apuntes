<?php

namespace app\Models;
use mysqli;


class Model{
    protected $host = HOST;
    protected $user = USER;
    protected $pass = PASS;
    protected $db_name = DB_NAME;

    protected $connection;

    protected $query;

    protected $table; // ES LA QUE VIENE EN CADA MODELO DE CADA OBJETO O TABLA, ACA EN ESTE ESTA VACIA

    public function __construct() {
        $this->connection();
    }

    public function connection(){
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

        if ($this -> connection -> connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql){
        $this->query = $this->connection->query($sql);

        return $this;
    }

    public function first(){
        return $this->query->fetch_assoc();
    }

    public function get(){
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    // CONSULTAS
    public function all(){ // TRAER TODOS LOS REGISTROS
        // SELECT * FROM tb_usuarios
        $sql = "SELECT * FROM {$this->table}";

        return $this -> query($sql) -> get();
    }

    public function find($id){ // ENCONTRAR POR ID
        // SELECT * FROM tb_usuarios WHERE id = $id
        $sql = "SELECT * FROM {$this->table} WHERE id = {$id}";

        return $this -> query($sql) ->  first();
    }

    public function where($column, $operador, $value = null){ // ENCONTRAR POR PARAMETRO

        if ($value == null) {
            $value = $operador;
            $operador = '=';
        }

        // SELECT * FROM tb_usuarios WHERE nombre = 'Juan'
        $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operador} '{$value}'";

        $this -> query($sql);

        return $this;

        // FALTA HACER CONSULTAS PREPARADAS
    }


    public function create($data){
        // INSERT INTO tb_usuarios (nombre, email, password) VALUES ('Juan', 'juan')
        $columns = array_keys($data);

        $columns = implode(', ', $columns);

        $values = array_values($data);

        $values = "'" . implode("', '", $values) . "'";

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";

        $this -> query($sql);

        // return $this->connection->insert_id;
    }

    public function update($id, $data){
        // UPDATE tb_usuarios SET nombre = 'Juan', email = 'juan@correo.com'

        $fields = [];

        foreach ($data as $key => $value) {
            $fields[] = "{$key} = '{$value}'";
        }

        $fields = implode(', ', $fields);

        $sql= "UPDATE {$this->table} SET {$fields} WHERE id = {$id}";

        $this -> query($sql);

        // return $this -> find($id);
    }

    public function delete($id){
        // DELETE FROM tb_usuarios WHERE id = 1
        $sql = "DELETE FROM {$this->table} WHERE id = {$id}";
        
        $this -> query($sql);
    }


}

?>