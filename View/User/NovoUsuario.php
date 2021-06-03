<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url(../../resources/style/beer.jpg);
            background-attachment: fixed;
            background-size: cover;
            background-position:center;
            font-family: "Comfortaa", sans-serif;
        }

        .cadastro {

            width: 480px;
            height: 420;
            border: 2px solid #000;
            border-radius: 80px 0px 80px 0px;
            color: #fff;
            background-image: linear-gradient(to right,#7e8f71,#557c64,#24695e);
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-sizing: border-box;
            padding: 68px 28px;
        }

        h2 {

            margin: 0;
            padding-top: 0;
            padding-left: 0;
            padding-bottom: 20px;
            letter-spacing: 10px;
            text-transform: uppercase;
            text-align: center;
            font-size: 25px;
        }

        h2:hover {
            color: #80ff80;
            transition: 0.2s;
        }

        .cadastro p {

            margin: 0;
            padding: 0;
            font-weight: bold;
        }

        .cadastro input {

            width: 100%;
            margin-bottom: 21px;
        }

        .cadastro input[type="password"],
        input[type="date"],
        input[type="email"],
        input[type="number"],
        input[type="text"] {

            border: none;
            border-bottom: 1px solid white;
            background: transparent;
            outline: none;
            height: 40px;
            color: white;
            font-size: 16px;
        }

        .cadastro button[type="submit"] {
            border: none;
            outline: none;
            height: 35px;
            color: #000;
            background: #fff;
            border-radius: 20px;
            transition: 0.2s;
        }

        .cadastro button[type="submit"]:hover {

            cursor: pointer;
            background: #80ff80;
            transition: 0.2s;
        }
    </style>
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
        </form>
    </div>
</body>

</html>