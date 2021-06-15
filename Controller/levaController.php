<?php

session_start();
include '../Model/Leva.php';
include '../DAO/LevaDAO.php';

function criar(){
    $erros = array();

    if (count($erros) == 0){
        $leva = new Leva();

        $leva->data = $_POST['dataLeva'];
        $leva->tipoLeva = $_POST['tipoLeva'];
        $leva->fervuraini = $_POST['fervuraInicio'];
        $leva->fervurafinal= $_POST['fervuraFim'];
        $leva->fermento = $_POST['fermento'];
       
        $levaDao= new LevaDAO();
        $levaDao->create($leva);
        header("location:../View/User/menu.php");
<<<<<<< HEAD
        
=======
>>>>>>> 9e5e320b2ebbbe428728fdea795818b44843622a
    }
    else {
        echo "Ocorreram erros ao cadastrar um novo Usuário!";
    }
}

function listar(){
    $levaDao = new LevaDAO();
    $leva = $levaDao->search();

    $_SESSION['leva'] = serialize($leva);
    header("location:../View/User/Listarlevas.php");
   
}

function atualizar(){
    echo "Metodo de atualizar";
}

function deletar(){
    $id = $_GET['id'];
    if(isset($id)){
        $levaDao = new LevaDAO();
        $levaDao->delete($id);
<<<<<<< HEAD
        listar();
=======
       listar();
>>>>>>> 9e5e320b2ebbbe428728fdea795818b44843622a
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

