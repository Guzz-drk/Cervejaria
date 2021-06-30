<?php
session_start();
$user = unserialize($_SESSION['usuario']);
if (!$user){
  header("location../../index.php");}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="../../resources/style/estiloCadastro.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>
    <div class="cadastro">
        <h2>Novo Usuário</h2>
        <form action="../../Controller/controller.php?operation=cadastrar" method="POST">
            <div>
                <p>Nome</p>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div>
                <p>Data de Nascimento</p>
                <input type="date" class="form-control" id="dataNascimento" required name="dataNascimento" max="<?php echo date('Y-m-d', strtotime('-18 year')); ?>">
            </div>
            <div>
                <p>E-mail</p>
                <input type="email" class="form-control" id="emailUsuario" required name="emailUsuario">
            </div>
            <div>
                <p>Senha</p>
                <input type="password" class="form-control" id="senhaUsuario" required name="senhaUsuario">
            </div>
            <div>
                <p>Numero de Brassagens</p>
                <input type="number" class="form-control" id="brassagenscont" required name="brassagenscont">
            </div>
            <div>
                <p>Quantidade de Cursos</p>
                <input type="number" class="form-control" id="cursoscerv" required name="cursoscerv">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <button type="submit" class="btn btn-primary"><a href="../../index.php">Voltar</a></button>
        </form>
    </div>
</body>

</html>