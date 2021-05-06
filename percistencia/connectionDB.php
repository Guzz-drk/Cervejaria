<?php

class connectionDB extends PDO {
 private static $instance =null;

 public function  __construct($dsn, $usuario, $senha){
     parent::__construct($dsn, $usuario, $senha);
 }

 public static function getInstance(){
    if (!isset(self::$instance)){
        try{
            self::$instance = new ConnectionDB(
                "pgsql:dbname=projBeer;host=localhost",
                "postgres",
                "masterkey"
            );
            echo "Conexão ao banco de dados efetuada!";
            header('Location:../index.php');

        } catch (Exception $e){
            echo "Ocorerram erros ao conectar!";
            echo $e;
            die();
            exit();
        }
    }
    return self::$instance;
}

}




?>