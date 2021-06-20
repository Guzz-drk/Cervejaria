<?php 
session_start();
$id=$_GET['id'];
echo "
<span>  <a href='../../Controller/levaController.php?operation=formmalte&id=$id'>Inserir Malte</a> </span>
";


$maltelevas= array();
$maltelevas= unserialize($_SESSION['malteleva']);




$levas= array();
$levas= unserialize($_SESSION['leva']);

foreach ($levas as $leva){
$nome_fermento=$leva['nome_fermento'];
$tipo_fermento=$leva['tipo_fermento'];
$marca_fermento=$leva['marca_fermento'];
$primeira_rampa=$leva['primeira_rampa'];
$temperatura_rampa=$leva['temp_primeira_rampa'];
$data_leva=$leva['data_leva'];
$agua=$leva['agua'];
$fermentog=$leva['fermentog'];
$nome_lupulo=$leva['nome_lupulo'];
$tipo_lupulo=$leva['tipo_lupulo'];
$origem_lupulo=$leva['origem_lupulo'];

echo "<br>
$nome_fermento<br> $tipo_fermento<br>
$marca_fermento<br>
$data_leva<br>
$tipo_fermento<br>
$agua<br>
$fermentog<br>
$nome_lupulo<br>
$tipo_lupulo<br>
$origem_lupulo<br>
$primeira_rampa<br>
$temperatura_rampa<br>";
}

$cont=1;
foreach ($maltelevas as $malteleva) {
    
    $nome=$malteleva['nome'];
    $quantiedade=$malteleva['quant'];
    echo"Malte $cont <br>
        $nome<br>
        $quantiedade<br>";
    $cont++;
}


?>
