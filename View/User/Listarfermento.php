<?php
session_start();
include "menu.php";
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
        <th scope="col">Nome do Fermento</th>
        <th scope="col">Tipo do Fermento</th>
        <th scope="col">Marca do Fermento</th>
        <th scope="col"></th>
      </tr>
      <?php

include_once '../../Model/Fermento.php';
$fermento = array();
$fermento = unserialize($_SESSION['fermentos']);

foreach ($fermento as $u) {
  $id = $u['id'];
  $nome = $u['nome'];
  $tipo= $u['tipo'];
  $marca =$u['marca'];
  echo "<tr>
 <td>$id</td>
 <td>$nome</td>
 <td>$tipo</td>
 <td>$marca</td>
 <td><a href='../../Controller/fermentoController.php?operation=deletar&id=$id'><img src='../../resources/icons/delete.png' width='20' height='20'></a></td>
</tr>";
}
?>
    </thead>
    <tbody>
    </tbody>
  </table>
</body>

</html>