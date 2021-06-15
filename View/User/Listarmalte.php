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
      <tr><th scope="col">ID #</th>
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
   $malte = unserialize($_SESSION['malte']);

   foreach($malte as $u){
       $id = $u['id'];
       $nome = $u['nome'];
<<<<<<< HEAD
       $tipo = $u['tipo_malte'];
=======
        $tipo = $u['tipo_malte'];
>>>>>>> 9e5e320b2ebbbe428728fdea795818b44843622a
       echo "<tr>
       <td>$id</td>
       <td>$nome</td>
       <td>$tipo</td>
       <td><a href='../../Controller/malteController.php?operation=deletar&id=$id'><img src='../../resources/icons/delete.png' width='20' height='20'></a></td>
     </tr>";
   }
   ?>
    </tbody>
  </table>
</body>

</html>