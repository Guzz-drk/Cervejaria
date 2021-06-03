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
  <table class="table table-hover" id="tabela">
    <thead>
      <tr>
        <th scope="col">Data da Leva</th>
        <th scope="col">Tipo de Leva</th>
        <th scope="col">Fervura Inicial</th>
        <th scope="col">Fervura Final</th>
        <th scope="col">Fermento da Leva</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</body>

</html>