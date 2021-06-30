<?php
session_start();
$user = unserialize($_SESSION['usuario']);
if (!$user){
  header("location../../index.php");}
include_once '../Model/Malte.php';
include_once '../DAO/malteDAO.php';

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
        echo "Ocorreram erros ao cadastrar um novo tipo de malte!";
    }
}

function listar(){
   $malteDao = new malteDAO();
    $malte = $malteDao->search();
    $_SESSION['maltes'] = serialize($malte);
    header("location:../View/User/Listarmalte.php");
   
}

function atualizar(){
    $id=$_GET['id'];
    $malte = new malteDAO();
    $maltea = $malte->veratt($id);
    $_SESSION['malte']= serialize($maltea);
    header("location:../view/User/malte.php");
}
function update(){
    $id=$_GET['id'];
    $nome=$_POST['nomeMalte'];
    $tipo=$_POST['tipoMalte'];
    $malte = new malteDAO();
    $malte->atualizar($id,$nome,$tipo);
    unset($_SESSION['malte']);
    unset($_SESSION['malte']);
    listar();


}

function deletar(){
    $id = $_GET['id'];
    if(isset($id)){
        $malteDao = new malteDAO();
        $malteDao->delete($id);
        listar();
    }
    else{
        echo "malte informado não existe!";
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
            case 'update';
                update();
                break;
        }
    }
?>

