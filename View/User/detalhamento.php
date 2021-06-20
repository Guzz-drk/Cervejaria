<?php
session_start();
include_once "menu.php";
echo "
<span>  <a href='../../Controller/levaController.php?operation=formmalte&id=$id'>Inserir Malte</a> </span>
";
$id = $_GET['id'];

$maltelevas = array();
$maltelevas = unserialize($_SESSION['malteleva']);

$levas = array();
$levas = unserialize($_SESSION['leva']);

foreach ($levas as $leva) {
    $nome_fermento = $leva['nome_fermento'];
    $tipo_fermento = $leva['tipo_fermento'];
    $marca_fermento = $leva['marca_fermento'];
    $data_leva = $leva['data_leva'];
    $agua = $leva['agua'];
    $fermentog = $leva['fermentog'];
    $nome_lupulo = $leva['nome_lupulo'];
    $tipo_lupulo = $leva['tipo_lupulo'];
    $origem_lupulo = $leva['origem_lupulo'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../resources/style/estiloML.css">
    <title>Document</title>
</head>

<body>
    <?php
    $user = unserialize($_SESSION['usuario']);
    if (!$user)
        header("location../../index.php");
    ?>

    <section>
        <div class="fundo">
            <div id="card1" class="card">
                <h4>Fermento</h2>
                    <p>Nome: <?php echo "$nome_fermento" ?></p>
                    <p>Tipo: <?php echo "$tipo_fermento" ?></p>
                    <p>Marca: <?php echo "$marca_fermento" ?></p>
                    <p>Quantidade: <?php echo "$fermentog" ?></p>
            </div>
            <div id="card2" class="card">
                <h4>Lúpulo</h4>
                <p>Nome: <?php echo "$nome_lupulo" ?></p>
                <p>Tipo: <?php echo "$tipo_lupulo" ?></p>
                <p>Origem: <?php echo "$origem_lupulo" ?></p>
            </div>
            <div id="card3" class="card">
                <h4>Leva</h4>
                <p>Data: <?php echo "$data_leva" ?></p>
                <p>Quantidade de água: <?php echo "$agua" . PHP_EOL . 'ml' ?></p>
            </div>
            <div id="card4" class="card">
                <?php
                $cont = 1;
                foreach ($maltelevas as $malteleva) {

                    $nome = $malteleva['nome'];
                    $quantiedade = $malteleva['quant'];

                    echo "<h4>Malte $cont</h4>";
                    echo "<p>Nome: $nome</p>";
                    echo "<p>Quantidade: $quantiedade</p>";
                    $cont++;
                }
                ?>
            </div>
        </div>
    </section>
</body>

</html>