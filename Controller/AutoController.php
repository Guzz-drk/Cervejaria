<?php

session_start();
include_once '../Model/Usuario.php';
include_once '../DAO/UsuarioDAO.php';

function login(){
    $email = $_POST['emailUsuario'];
    $senha = $_POST['senhaUsuario'];

    $userDao = new UsuarioDAO();
    $user = $userDao->find($email, $senha);

    if($user){
        $_SESSION['usuario'] = serialize($user);
        header("location:../../View/app.php");
    }
    else{
        unset($_SESSION['usuario']);
        header("location:../../index.php");
    }
}

function logout(){
    unset($_SESSION['usuario']);
    header("location:../../index.php");
}

$operacao = $_GET['operation'];
if (isset($operacao)){
    switch($operacao){
        case 'login':
            login();
            break;
        case 'logout':
            logout();
            break;
    }
}
?>