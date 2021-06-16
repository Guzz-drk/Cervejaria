<?php
class Leva{

    var $data;
    var $tipoleva;
    var $fervuraini;
    var $fervurafinal;
    var $fermento;
    var $fermentog;
    var $agua;
    var $lupulo;
    
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