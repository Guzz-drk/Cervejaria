<?php
include "User/menu.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjBeer</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/style/estiloLogin.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="login">
        <img src="resources/icons/user.png" class="usuario" width="100" height="100" alt="">
        <h1>Login</h1>
        <form action="../../Controller/AutoController.php?operation=login" method="POST">
            <div class="form-group">
                <p>E-mail</p>
                <input type="text" class="form-control" id="emailUsuario" name="emailUsuario" required placeholder="Insira o e-mail cadastrado!">
            </div>
            <div class="form-group">
                <p>Senha</p>
                <input type="password" class="form-control" id="senhaUsuario" required name="senhaUsuario" placeholder="*************">
            </div>
            <button type="submit" class="btn btn-primary" value="Login">Entrar</button>
            <br><a href="View/User/NovoUsuario.php">Não tenho conta</a>
        </form>
    </div>
</body>
</html>