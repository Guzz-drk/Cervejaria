<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../resources/style/estiloTabela.css">
  <title>Document</title>
</head>

<body>
  <?php
  $user = unserialize($_SESSION['usuario']);
  if (!$user)
    header("location../../index.php");
  ?>
  <table class="table table-hover" id="tabela">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Brasagens</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>


      <?php
      include_once 'menu.php';
      if (isset($_SESSION['users'])) {
        include_once '../../Model/Usuario.php';

        $users = array();
        $users = unserialize($_SESSION['users']);

        foreach ($users as $u) {
          $id = $u['id'];
          $nome = $u['nome'];
          $email = $u['email'];
          $brassagens = $u['numbrassagens'];
          echo "<tr>
            <td>$nome</td>
            <td>$email</td>
            <td>$brassagens</td>
            <td><a href='../../Controller/controller.php?operation=deletar&id=$id'><img src='../../resources/icons/delete.png' width='20' height='20'></a></td>
          </tr>";
        }

        unset($_SESSION['users']);
      }
      ?>
    </tbody>
  </table>
</body>

</html>