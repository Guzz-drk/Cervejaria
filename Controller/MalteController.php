<?php

session_start();
include '../Model/Malte.php';
include '../DAO/malteDAO.php';

function criar(){
    $erros = array();

    if (count($erros) == 0){
        $malte = new Malte();

        $malte->nome = $_POST['nomeMalte'];
        $malte->tipo_malte = $_POST['tipoMalte'];
        
        $levaDao= new malteDAO();
        $levaDao->create($malte);
        header("location:../View/User/menu.php");
        
    }
    else {
        echo "Ocorreram erros ao cadastrar um novo Usuário!";
    }
}

function listar(){
    $malteDao = new malteDAO();
    $malte = $malteDao->search();

    $_SESSION['malte'] = serialize($malte);
    header("location:../View/User/Listarmalte.php");
   
}

function atualizar(){
    echo "Metodo de atualizar";
}

function deletar(){
    $id = $_GET['id'];
    if(isset($id)){
        $malteDao = new malteDAO();
        $malteDao->delete($id);
        listar();
    }
    else{
        echo "Usuário informado não existe!";
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

