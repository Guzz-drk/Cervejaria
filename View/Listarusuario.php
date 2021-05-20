<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'menu.php';
    if (isset($_SESSION['users'])){
        include_once '../Model/Usuario.php';
      
        $users = array();
        $users = unserialize($_SESSION['users']);

        foreach($users as $u){
            $id = $u['id'];
            $nome = $u['nome'];
            $emailUsuario = $u['emailUsuario'];
            echo"<tr><td><a href = '../Controller/controller.php?operation=deletar&id=$id'>Deletar</a></td>- $nome<br></tr> ";
        }
        
        unset($_SESSION['users']);
    }
    ?>
</body>
</html>