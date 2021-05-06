<?php

class Usuario {
    var $nome;
    var $dataNascimento;
    var $emailUsuario;
    var $senhaUsuario;
    var $brassagenscont;
    var $cursoscerv;



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