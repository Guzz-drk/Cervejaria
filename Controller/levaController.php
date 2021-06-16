<?php

session_start();
include_once '../Model/Leva.php';
include_once '../DAO/LevaDAO.php';
include_once '../Model/Fermento.php';
include_once '../DAO/fermentoDAO.php';
include_once '../Model/Lupulo.php';
include_once '../DAO/lupuloDAO.php';


function criar(){
    $erros = array();

    if (count($erros) == 0){
        $leva = new Leva();

        $leva->data = $_POST['dataLeva'];
        $leva->tipoLeva = $_POST['tipoLeva'];
        $leva->fervuraini = $_POST['fervuraInicio'];
        $leva->fervurafinal= $_POST['fervuraFim'];
        $leva->fermento = $_POST['fermento'];
        $leva->fermentog = $_POST['fermentog'];
        $leva->agua=$_POST['aguaLeva'];
        $leva->lupulo=$_POST['lupulo'];
        $levaDao= new LevaDAO();
        $levaDao->create($leva);
        header("location:../View/User/menu.php");
        
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
        listar();
    }
    else{
        echo "Usuário informado não existe!";
    }
}
function formulario(){
    $fermento = new fermentoDAO();
    $fermentos = $fermento->search();
    $_SESSION['fermentos'] = serialize($fermentos);
    $lupulo = new lupuloDAO();
    $lupulos = $lupulo->search();
    $_SESSION['lupulos'] = serialize($lupulos);
    header("location:../View/User/Levas.php");

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
            case 'form';
                formulario();
                break;
           
            }
    }
?>



 