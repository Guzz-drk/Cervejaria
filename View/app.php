<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso ao Sistema</title>
</head>
<body>
    <?php
        if (isset($_SESSION['usuario'])){
            header("location:User/menu.php");
            
        }
        else{
            echo "<h1>Usuário Offline</h1>";
        }
    ?>
</body>
</html>