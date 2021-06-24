<?php
session_start();
include_once "menu.php";
$id = $_GET['id'];
echo "<span>  </span>";


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
    $temp = $leva['temp_primeira_rampa'];
    $primeira = $leva['primeira_rampa'];
}

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../../resources/style/estiloML.css">

<body>
    <?php
    $user = unserialize($_SESSION['usuario']);
    if (!$user)
        header("location../../index.php");
    ?>

    <section>
        <div class="fundo">
            <div id="card1" class="card">
                <img src="../../resources/icons/fermento.png" alt="">
                <h4>Fermento</h2>
                    <p><b>Nome:</b><br> <?=$nome_fermento?></p>
                    <p><b>Tipo:</b><br> <?=$tipo_fermento?></p>
                    <p><b>Marca:</b><br><?=$marca_fermento?></p>
                    <p><b>Quantidade:</b><br><?=$fermentog?></p>
            </div>
            <div id="card2" class="card">
                <img src="../../resources/icons/hop.png" alt="">
                <h4>Lúpulo</h4>
                <p><b>Nome:</b><br><?=$nome_lupulo?></p>
                <p><b>Tipo:</b><br><?=$tipo_lupulo?></p>
                <p><b>Origem:</b><br><?=$origem_lupulo?></p>
            </div>
            <div id="card3" class="card">
                <img src="../../resources/icons/pote-magico.png" alt="">
                <h4>Leva</h4>
                <p><b>Primeira Rampa:</b> <br><?= $primeira . " minutos" ?> </p>
                <p><b>Temperatura:</b><br><?= $temp . " C º" ?></p>
                <p><b>Data:</b><br><?=$data_leva?></p>
                <p><b>Quantidade de água:</b><br><?=$agua  . 'Litros' ?></p>
            </div>
            <div id="card4" class="card">
                <img src="../../resources/icons/cerveja.png" alt="">
                <?php
                $cont = 1;
                foreach ($maltelevas as $malteleva) {

                    $nome = $malteleva['nome'];
                    $quantiedade = $malteleva['quant'];

                    echo "<h4>Malte $cont</h4>";
                    echo "<p><b>Nome:</b><br> $nome</p>";
                    echo "<p><b>Quantidade:</b><br> $quantiedade</p>";
                    $cont++;
                }
               echo" <h5><a class='h5' href='../../Controller/levaController.php?operation=formmalte&id=$id'>Inserir Malte</a></h5>";
                ?>
                
            </div>
        </div>
    </section>
</body>

</html>