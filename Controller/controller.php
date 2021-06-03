<?php
session_start();
include '../Model/Usuario.php';
include '../Include/UsuarioValidate.php';
include '../DAO/UsuarioDAO.php';

function criar(){
    $erros = array();

    if(!UsuarioValidate::validaEmail($_POST['emailUsuario'])){
        $erros[] = 'E-mail Inválido!';
    }

    if (count($erros) == 0){
        $usuario = new Usuario();

        $usuario->nome = $_POST['nome'];
        $usuario->dataNascimento = $_POST['dataNascimento'];
        $usuario->emailUsuario = $_POST['emailUsuario'];
        $usuario->senhaUsuario = $_POST['senhaUsuario'];
        $usuario->brassagenscont = $_POST['brassagenscont'];
        $usuario->cursoscerv = $_POST['cursoscerv'];

        $userDao = new UsuarioDAO();
        $userDao->create($usuario);
    }
    else {
        echo "Ocorreram erros ao cadastrar um novo Usuário!";
    }
}

function listar(){
    $userDao = new UsuarioDAO();
    $usuario = $userDao->search();

    $_SESSION['users'] = serialize($usuario);
    header("location:../View/User/Listarusuario.php");
   
}

function atualizar(){
    echo "Metodo de atualizar";
}

function deletar(){
    $id = $_GET['id'];
    if(isset($id)){
        $userDao = new UsuarioDAO();
        $userDao->delete($id);
        header("location:../../Controller/controller.php?operation=consultar");
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