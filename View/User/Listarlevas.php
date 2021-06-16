<?php
session_start();
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
        <th scope="col">Data da Leva</th>
        <th scope="col">Tipo de Leva</th>
        <th scope="col">Fermento da Leva</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php

      include_once '../../Model/Leva.php';

      $leva = array();
      $leva = unserialize($_SESSION['leva']);

      foreach ($leva as $u) {
        $id = $u['id'];
        $data = $u['data_leva'];
        $tipo = $u['tipo'];
        $fermento = $u['fermento'];
        echo "<tr>
            <td>$id</td>
            <td>$data</td>
            <td>$tipo</td>
            <td>$fermento</td>
            <td><a href='../../Controller/levaController.php?operation=deletar&id=$id'><img src='../../resources/icons/delete.png' width='20' height='20'></a></td>
          </tr>";
      }


      ?>
    </tbody>
  </table>
</body>

</html>