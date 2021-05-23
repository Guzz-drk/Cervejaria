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
<form action="../../Controller/AutoController.php?operation=login" method="POST">
            <div class="form-group">
                <label for="emailUsuario">Email:</label>
                <input type="text" class="form-control" id="emailUsuario" name="emailUsuario" required>
            </div>
            <div class="form-group">
                <label for="senhaUsuario">Senha:</label>
                <input type="password" class="form-control" id="emailUsuario" required name="senhaUsuario">
            </div>
            <button type="submit" class="btn btn-primary" value="login">Login</button>
            <button type="reset" class="btn btn-primary" value="limpar">Limpar</button>
</body>
</html>