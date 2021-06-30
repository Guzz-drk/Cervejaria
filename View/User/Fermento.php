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
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../resources/style/estiloMalte.css">
</head>

<body>
    <?php
    $user = unserialize($_SESSION['usuario']);
    if (!$user)
        header("location../../index.php");
    ?>
    <div class="cadastro">
        <?php $fermentos = unserialize($_SESSION['fermento']);
    foreach ($fermentos as $fermento) {
    $id = $fermento['id'];
    $nome = $fermento['nome'];
    $tipo = $fermento['tipo'];
    $marca = $fermento['marca'];
    }
    if(!$fermento){
        echo"
        <h2>Cadastrar Fermento</h2>
        <form action='../../Controller/fermentoController.php?operation=cadastrar' method='POST'>";
    }
    else
    echo "
    <h2>Atualizar Fermento</h2>
    <form action='../../Controller/fermentoController.php?operation=update&id=$id' method='POST'>";
    
    ?>       
            <div class="form-group">
                <p>Nome:</p>
                <input type="text" class="form-control" id="nomeFermento" name="nomeFermento" value="<?=$nome?>" required>
            </div>
            <div class="form-group">
                <p>Tipo de Fermento</p>
                <input type="text" class="form-control" id="tipoFermento" name="tipoFermento" value="<?=$tipo?>" required>
            </div>
            <div class="form-group">
                <p>Marca do Fermento</p>
                <input type="text" class="form-control" id="marcaFermento" name="marcaFermento" value="<?=$marca?>" required>
            </div>
            <?php
            if(!$fermento){
            echo "<button type='submit' class='btn btn-primary'>Enviar</button>";}
            else{
            echo "<button type='submit' class='btn btn-primary'>Atualizar</button>";
        }
            ?>
        </form>
    </div>
</body>

</html>