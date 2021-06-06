<?php
class Malte{
    var $nome;
    var $tipomalte;
    
    public function __construct(){
        
    }
    public function __set($nome,$valor){
        $this->$nome = $valor;    
    }
    public function __get($nome){
        return $this->$nome;
    }





}


?>