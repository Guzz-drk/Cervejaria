<?php
include '../Model/Usuario.php';
include '../Include/UsuarioValidate.php';
include '../DAO/UsuarioDAO.php';

function criar(){
    $erros = array();

    if(!UsuarioValidate::validaEmail($_POST['emailUsuario'])){
        $erros[] = 'E-mail Inválido!';
    }
    if(!UsuarioValidate::validaIdade($_POST['dataNascimento'])){
        $erros[] = 'Idade abaixo do permitido!';
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
                deletar();
                break;
        }
    }
?>