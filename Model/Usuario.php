<?php

class Usuario {
    private $nome;
    private $dataNascimento;
    private $emailUsuario;
    private $senhaUsuario;
    private $brassagenscont;
    private $cursoscerv;



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