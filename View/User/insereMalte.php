<?php
include_once "menu.php";
session_start();
$id_leva = $_GET['id_leva']
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resources/style/estiloMalte.css">
    <title>Document</title>
</head>

<body>
    <?php
    $user = unserialize($_SESSION['usuario']);
    if (!$user)
        header("location../../index.php");
    ?>


    <form action="../../Controller/levaController.php?operation=maltes" method="POST" class="cadastro">
        <input hidden name="id_leva" type="int" value="<?= $id_leva ?>">
        <h2>Insere Malte</h2>
        <p>Maltes</p>
        <select name="id_malte" id="malte" style="width: 440px; height: 35px;">
            <?php
            $maltes = array();
            $maltes = unserialize($_SESSION['maltes']);
            var_dump($maltes);
            foreach ($maltes as $malte) : ?>
                <option value="<?= $malte['id'] ?>"> <?= $malte['nome'] ?></option>
            <?php endforeach; ?>
        </select>
        <p>Quantidade</p>
        <input type="number" step="0.1" name="quant">
        <button type="submit">enviar</button>
    </form>
</body>

</html>