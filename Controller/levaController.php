<?php

session_start();
include_once '../Model/Leva.php';
include_once '../DAO/LevaDAO.php';
include_once '../Model/Fermento.php';
include_once '../DAO/fermentoDAO.php';
include_once '../Model/Lupulo.php';
include_once '../DAO/lupuloDAO.php';
include_once '../Model/MalteLeva.php';
include_once '../DAO/MalteLevaDao.php';
include_once '../DAO/malteDAO.php';
include_once '../Model/Malte.php';


function criar(){
    $erros = array();

    if (count($erros) == 0){
        $leva = new Leva();

        $leva->data = $_POST['dataLeva'];
        $leva->tipoLeva = $_POST['tipoLeva'];
        $leva->primeira_rampa = $_POST['primeira_rampa'];
        $leva->temp_primeira_rampa= $_POST['temp_primeira_rampa'];
        $leva->fermento = $_POST['fermento'];
        $leva->fermentog = $_POST['fermentog'];
        $leva->agua=$_POST['aguaLeva'];
        $leva->lupulo=$_POST['lupulo'];

       
        $levaDao= new LevaDAO();
        $levaDao->create($leva);
        
    listar();
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


function maltes(){
    $malte_leva = new MalteLeva;
            $malte_leva->id_leva=$_POST['id_leva'];
            $malte_leva->id_malte=$_POST['id_malte'];
            $malte_leva->quant=$_POST['quant'];
   
           $maltelevaDAO = new MalteLevaDAO;
           $maltelevaDAO->create($malte_leva);
           
    listar();
       
}
function detalhes(){
    $id= $_GET['id'];

    $maltelevaDAO = new MalteLevaDAO();
    $malteleva = $maltelevaDAO->localiza($id);

    $_SESSION['malteleva'] = serialize($malteleva);

    $levaDAO = new LevaDAO();
    $leva = $levaDAO->localiza($id);

    $_SESSION['leva'] = serialize($leva);





    header("location:../View/User/detalhamento.php?id=$id");

}
function formmaltes(){
    $id= $_GET['id'];

    $malte = new malteDAO();
    $maltes = $malte->search();
    var_dump($maltes);
    $_SESSION['maltes'] = serialize($maltes);
    header("location:../View/User/insereMalte.php?id_leva=$id");
}

function graficos(){
    $levaDao = new LevaDAO();
    $leva = $levaDao->search();

    $_SESSION['graficos'] = serialize($leva);
    header('location:../View/User/index.php');

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
            case 'maltes';
                maltes();
                break;
            case 'detalhes';
                detalhes();
                break;
            case 'formmalte';
                formmaltes();
                break;
            case 'graficos';
                graficos();
                break;
            }
    }
?>



 