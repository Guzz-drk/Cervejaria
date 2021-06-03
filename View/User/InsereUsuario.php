<?php include "menu.php";
session_start(); ?>
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
</head>

<body>
    <div class="cadastro">
        <div class="container">
            <h2>Novo Usuário</h2>
            <form action="../../Controller/controller.php?operation=cadastrar" method="POST">
                <div class="form-group">
                    <p>Nome</p>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <p>Data de Nascimento</p>
                    <input type="date" class="form-control" id="dataNascimento" required name="dataNascimento" max="<?php echo date('Y-m-d', strtotime('-18 year')); ?>">
                </div>
                <div class="form-group">
                    <p>E-mail</p>
                    <input type="email" class="form-control" id="emailUsuario" required name="emailUsuario">
                </div>
                <div class="form-group">
                    <p>Senha</p>
                    <input type="password" class="form-control" id="senhaUsuario" required name="senhaUsuario">
                </div>
                <div class="form-group">
                    <p>Número de Brassagens</p>
                    <input type="number" class="form-control" id="brassagenscont" required name="brassagenscont">
                </div>
                <div class="form-group">
                    <p>Qunatidade de Cursos feitos</p>
                    <input type="number" class="form-control" id="cursoscerv" required name="cursoscerv">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</body>

</html>