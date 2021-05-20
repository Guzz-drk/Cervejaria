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
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Brasagens</th>
    </tr>
  </thead>
  <tbody>
      

    <?php
    include 'menu.php';
    if (isset($_SESSION['users'])){
        include_once '../Model/Usuario.php';
      
        $users = array();
        $users = unserialize($_SESSION['users']);

        foreach($users as $u){
            $id = $u['id'];
            $nome = $u['nome'];
            $email = $u['email'];
            $brassagens = $u['numbrassagens'];
            echo "<tr>
            <td>$nome</td>
            <td>$email</td>
            <td>$brassagens</td>
          </tr>";
        }
        
        unset($_SESSION['users']);
    }
    ?>
    </tbody>
    </table>
</body>
</html>