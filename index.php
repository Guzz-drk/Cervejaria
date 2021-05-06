<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Controller/controller.php" method="POST">
    <label for="">Nome</label>
    <input type="text" id="nome" name="nome">
    <label for="">Data de Nascimento</label>
    <input type="date" id="dataNascimento" name="dataNascimento">
    <label for="">E-mail</label>
    <input type="email" id="emailUsuario" name="emailUsuario">
    <label for="">Senha</label>
    <input type="password" id="senhaUsuario" name="senhaUsuario">
    <label for="">Numero de Brassagens</label>
    <input type="number" id="brassagenscont" name="brassagenscont">
    <label for="">Quant de Cursos</label>
    <input type="number" id="cursoscerv" name="cursoscerv">
    <button type="submit" id="cadastrar">Cadastrar</button>
    </form>
</body>
</html>