<?php

session_start();
include_once '../Model/Fermento.php';
include_once '../DAO/fermentoDAO.php';

function criar(){
    $erros = array();

    if (count($erros) == 0){
       $fermento= new Fermento();

        $fermento->nome = $_POST['nomeFermento'];
        $fermento->tipo = $_POST['tipoFermento'];
        $fermento->marca = $_POST['marcaFermento'];
       
        $fermentoDao= new fermentoDAO();
        $fermentoDao->create($fermento);
        header("location:../View/User/menu.php");
    }
    else {
        echo "Ocorreram erros ao cadastrar um novo fermento!";
    }
}

function listar(){
    $fermento = new fermentoDAO();
    $fermentos = $fermento->search();

    $_SESSION['fermentos'] = serialize($fermentos);
    header("location:../View/User/Listarfermento.php");
   
}

function atualizar(){
    echo "Metodo de atualizar";
}

function deletar(){
    $id = $_GET['id'];
    if(isset($id)){
        $fermentoDao = new fermentoDAO();
        $fermentoDao->delete($id);
       listar();
    }
    else{
        echo "fermento informado não existe!";
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

