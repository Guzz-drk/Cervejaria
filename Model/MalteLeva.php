<?php
class MalteLeva{
    var $id_leva;
    var $id_malte;
    var $quant;
    
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