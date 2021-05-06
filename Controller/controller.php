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
else{
    echo "Informe todos os campos corretamente!";
}

?>