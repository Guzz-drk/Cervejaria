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
        <th scope="col">ID#</th>
        <th scope="col">Nome do Malte</th>
        <th scope="col">Tipo do Malte</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php

      include_once '../../Model/Malte.php';

      $malte = array();
      $malte = unserialize($_SESSION['maltes']);

      foreach ($malte as $u) {
        $id = $u['id'];
        $nome = $u['nome'];
        $tipomalte = $u['tipo_malte'];
        echo "<tr>
       <td>$id</td>
       <td>$nome</td>
       <td>$tipomalte</td>
       <td><a href='../../Controller/malteController.php?operation=atualizar&id=$id'><img src='../../resources/icons/editar-arquivo.png' width='20' height='20' alt=''></a></td>
       <td><a href='../../Controller/malteController.php?operation=deletar&id=$id'><img src='../../resources/icons/delete.png' width='20' height='20'></a></td>
     </tr>";
      }
      ?>
    </tbody>
  </table>
</body>

</html>