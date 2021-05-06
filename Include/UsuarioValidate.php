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
        public static function validaIdade($paramIdade){
            $idade = 0;
            $data_nascimento = date('Y-m-d', strtotime($paramIdade));
            list($anoNasc, $mesNasc, $diaNasc) = explode('/', $data_nascimento);
            
               $idade      = date("Y") - $anoNasc;
               if (date("m") < $mesNasc){
                   $idade -= 1;
               } elseif ((date("m") == $mesNasc) && (date("d") <= $diaNasc) ){
                   $idade -= 1;
               }
            
               return true;
           }
           

    }

?>