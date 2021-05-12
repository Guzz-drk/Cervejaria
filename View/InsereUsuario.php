<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <?php include "menu.php" ?>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <h2>Adicionar Usuário</h2>
        <form action="../Controller/controller.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="dataNascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="dataNascimento" required name="dataNascimento" max="<?php echo date('Y-m-d', strtotime('-18 year')); ?>">
            </div>
            <div class="form-group">
                <label for="emailUsuario">E-mail:</label>
                <input type="email" class="form-control" id="emailUsuario" required name="emailUsuario">
            </div>
            <div class="form-group">
                <label for="senhaUsuario">Senha:</label>
                <input type="password" class="form-control" id="senhaUsuario" required name="senhaUsuario">
            </div>
            <div class="form-group">
                <label for="brassagenscont">Número de Brassagens:</label>
                <input type="number" class="form-control" id="brassagenscont" required name="brassagenscont">
            </div>
            <div class="form-group">
                <label for="cursoscerv">Quantidade de Cursos Feitos:</label>
                <input type="number" class="form-control" id="cursoscerv" required name="cursoscerv">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>