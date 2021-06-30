<?php
session_start();
$user = unserialize($_SESSION['usuario']);
if (!$user){
  header("location../../index.php");}
include_once('menu.php');

$fermentos = array();
$maltes = array();
$lupulo = array();
$lupulo = unserialize($_SESSION['lupulos']);
$maltes = unserialize($_SESSION['maltes']);
$fermentos = unserialize($_SESSION['fermentos']);

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


    <form action="../../Controller/levaController.php?operation=busca" method="POST">

        <center> <b> BUSCA DE RECEITA POR INGREDIENTES </b></center>
        <center><b>lupulo:</b></center><br>
        <center> <select name="lupulo" id="lupulo">

                <option value="" selected>Selecione um Lupulo</option>
                <?php foreach ($lupulo as $lupulos) {
                    $id = $lupulos['id'];
                    $nome = $lupulos['nome'];
                    echo "   <option value='$id'>$nome</option>";
                } ?>
            </select><br>
        <center><b>maltes:</b></center>
        <center>
            <select name="malte" id="malte">
                <option value="">Selecione um Malte</option>
                <?php foreach ($maltes as $malte) {
                    $id = $malte['id'];
                    $nome = $malte['nome'];
                    echo "<option value='$id'>$nome</option>";
                } ?>
            </select><br>

            <label for="quantMalte">
                <center><b>Quantidade de Malte:</b></center>
            </label><br>
            <input type="number" name="quantMalte" placeholder="quantidade de malte em kg">
        </center>
        <br>
        <center><label for="Fermento"><b>fermento</b></label> <br>
            <select name="fermento" id="fermento">
                <option value="">selecione um Fermento</option><br>
                <?php foreach ($fermentos as $fermento) {
                    $id = $fermento['id'];
                    $nome = $fermento['nome'];
                    echo "<option value='$id'>$nome</option>";
                } ?>
            </select><br>
            <label for="quantFermento"><b> Quantidade de Fermento </b></label><br>
            <input type="number" name="quantFermento" placeholder="Quantidade de Fermento em Gramas">
        </center>
        <center>
            <button type="submit"> Buscar!</button>
        </center>
    </form>
</body>

</html>