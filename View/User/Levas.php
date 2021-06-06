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
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../resources/style/estiloLeva.css">
</head>
<body>
    <div class="cadastro">
        <h2>Cadastrar Leva</h2>
        <form action="../../Controller/levaController.php?operation=cadastrar" method="POST">
            <div class="form-group">
                <p>Data da Leva</p>
                <input type="date" class="form-control" id="dataLeva" name="dataLeva" required>
            </div>
            <div class="form-group">
                <p>Tipo de Leva</p>
                <input type="text" class="form-control" id="tipoLeva" name="tipoLeva" required>
            </div>
            <div class="form-group">
                <p>Fervura Inicial</p>
                <input type="text" class="form-control" id="fervuraInicioLeva" name="fervuraInicio" required>
            </div>
            <div class="form-group">
                <p>Fervura Final</p>
                <input type="text" class="form-control" id="fervuraFimLeva" name="fervuraFim" required>
            </div>
            <div class="form-group">
                <p>Fermento</p>
                <input type="text" class="form-control" id="fermentoLeva" name="fermento" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>