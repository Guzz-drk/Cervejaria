<?php

    class UsuarioValidate{

        public static function validaEmail($paramEmail){
            $Sintaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
            if (preg_match($Sintaxe, $paramEmail)){
                return true;
            }
            else {
                return false;
            }
        }

        public static function validaIdade($paramNascimento){
            $data_atual = date("d-m-Y");
            $idade = $data_atual - $paramNascimento;
          
         $msg_menor =  " Você ainda não tem 18 anos!!";
      
         $msg_maior = "você pode avançar. É maior de idade";	  
          
            return ($idade < 18) ? $msg_menor : $msg_maior;
      }
    }

?>