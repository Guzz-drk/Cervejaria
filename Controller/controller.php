<?php
include '../Model/Usuario.php';
include '../Include/UsuarioValidate.php';
include '../DAO/UsuarioDAO.php';

if ((!empty($_POST['nome'])) && (!empty($_POST['dataNascimento']))&&
(!empty($_POST['emailUsuario'])) && (!empty($_POST['senhaUsuario'])) &&
(!empty($_POST['brassagenscont'])) && (!empty($_POST['cursoscerv']))) {

    $erros = array();

    if(!UsuarioValidate::validaEmail($_POST['emailUsuario'])){
        $erros[] = 'E-mail Inválido!';
    }
    if(!UsuarioValidate::validaIdade($_POST['dataNascimento'])){
        $erros[] = 'Idade abaixo do permitido!';
    }

    if (count($erros) == 0){
        $user = new Usuario();

        $user->nome = $_POST['nome'];
        $user->nome = $_POST['dataNascimento'];
        $user->nome = $_POST['emailUsuario'];
        $user->nome = $_POST['senhaUsuario'];
        $user->nome = $_POST['brassagenscont'];
        $user->nome = $_POST['cursoscerv'];

        $userDao = new UsuarioDAO();
        $userDao->create($user);
    }
    else {
        echo "Ocorreram erros ao cadastrar um novo Usuário!";
    }
}
else{
    echo "Informe todos os campos corretamente!";
}

?>