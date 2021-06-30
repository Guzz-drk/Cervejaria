<?php
session_start();
$user = unserialize($_SESSION['usuario']);
if (!$user){
  header("location../../index.php");}
include_once "menu.php";
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
        <th scope="col">#id</th>
        <th scope="col">Nome do Lúpulo</th>
        <th scope="col">Tipo do Lúpulo</th>
        <th scope="col">Origem do Lúpulo</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
      <?php

      include_once '../../Model/Lupulo.php';

      $lupulo = array();
      $lupulo = unserialize($_SESSION['lupulos']);

      foreach ($lupulo as $u) {
        $id = $u['id'];
        $nome = $u['nome'];
        $tipo= $u['tipo'];
        $origem =$u['origem'];
        echo "<tr>
       <td>$id</td>
       <td>$nome</td>
       <td>$tipo</td>
       <td>$origem</td>
       <td>
       <a href='../../Controller/lupuloController.php?operation=atualizar&id=$id'><img src='../../resources/icons/editar-arquivo.png' width='20' height='20' alt=''></a></td>
       <td><a href='../../Controller/lupuloController.php?operation=deletar&id=$id'><img src='../../resources/icons/delete.png' width='20' height='20'></a></td>
     </tr>";
      }
      ?>
    </thead>
    <tbody>
    </tbody>
  </table>
</body>

</html>