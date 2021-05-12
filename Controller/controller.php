<?php
include '../Model/Usuario.php';
include '../Include/UsuarioValidate.php';
include '../DAO/UsuarioDAO.php';

function criar(){
    echo "Metodo de criação";
}

function listar(){
    echo "Metodo de Listagem";
}

function atualizar(){
    echo "Metodo de atualizar";
}

function deletar(){
    echo "Metodo de deletar";
}

    $operacao = $_GET['operation'];
    if(isset($operacao)){
        switch($operacao){
            case 'cadastrar';
                criar();
                break;
            case 'consultar';
                listar();
                break;
            case 'atualizar';
                atualizar();
                break;
            case 'deletar';
                criar();
                break;
        }
    }
?>