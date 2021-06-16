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
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../resources/style/estiloLeva.css">
</head>

<body>
    <?php
    $user = unserialize($_SESSION['usuario']);
    if (!$user)
        header("location../../index.php");
    ?>
    <div class="cadastro">
        <h2>Cadastrar Leva</h2>
        <form action="../../Controller/levaController.php?operation=cadastrar" method="POST">
            <div class="form-group">
                <p>Data da Leva</p>
                <input type="date" class="form-control" id="dataLeva" name="dataLeva" required>
            </div>
            <div class="form-group">
                <p>Tipo de Leva</p>
                <input type="text" class="form-control" id="tipoLeva" placeholder="ex.: Pilsen" name="tipoLeva" required>
            </div>
            <div class="form-group">
                <p>Fervura Inicial</p>
                <input type="datetime-local" class="form-control" id="fervuraInicioLeva" name="fervuraInicio" required>
            </div>
            <div class="form-group">
                <p>Fervura Final</p>
                <input type="datetime-local" class="form-control" id="fervuraFimLeva" name="fervuraFim" required>
            </div>
            <div class="form-group">
                <p>Fermento</p>
                <select name="fermento" class="form-control">
                <option value="#" selected>selecione o tipo de Fermento</option>
                    <?php
                    $fermentos = array();
                    $fermentos = unserialize($_SESSION['fermentos']);
                    var_dump($fermentos);
                    foreach ($fermentos as $fermento) : ?>
                        <option value="<?= $fermento['id'] ?>"> <?= $fermento['nome']?></option>
                    <?php endforeach; ?>
                </select>
                <input type="number" step="0.1" class="form-control" id="fermentog" name="fermentog" placeholder="quantiedade de fermento" required>
            </div>
            <div class="form-group">
                <p>Água</p>
                <input type="number" placeholder="litragem de agua" step="0.1" class="form-control" id="aguaLeva" name="aguaLeva" required>
            </div>
            <p>lupulo</p>
            <select name="lupulo" class="form-control">
                <option value="#" selected>selecione o tipo de Lupulo</option>
                    <?php
                    $lupulos = array();
                    $lupulos = unserialize($_SESSION['lupulos']);
                    foreach ($lupulos as $lupulo) : ?>
                        <option value="<?= $lupulo['id'] ?>"> <?= $lupulo['nome']?></option>
                    <?php endforeach; ?>
                </select>
                <br>
            <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

    
    </form>
    </div>
</body>

</html>