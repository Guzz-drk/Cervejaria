<?php

session_start();
include_once '../Model/Lupulo.php';
include_once '../DAO/lupuloDAO.php';

function criar(){
    $erros = array();

    if (count($erros) == 0){
        $lupulo = new Lupulo();

        $lupulo->nome = $_POST['nomeLupulo'];
        $lupulo->tipo = $_POST['tipoLupulo'];
        $lupulo->origem = $_POST['origemLupulo'];
       
        $lupuloDao= new lupuloDAO();
        $lupuloDao->create($lupulo);
        header("location:../View/User/menu.php");
    }
    else {
        echo "Ocorreram erros ao cadastrar um novo lupulo!";
    }
}

function listar(){
    $lupulo = new lupuloDAO();
    $lupulos = $lupulo->search();

    $_SESSION['lupulos'] = serialize($lupulos);
    header("location:../View/User/Listarlupulo.php");
   
}

function atualizar(){
    echo "Metodo de atualizar";
}

function deletar(){
    $id = $_GET['id'];
    if(isset($id)){
        $lupuloDao = new lupuloDAO();
        $lupuloDao->delete($id);
       listar();
    }
    else{
        echo "lupulo informado não existe!";
    }
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
                deletar();
                break;
        }
    }
?>

