<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../resources/style/estiloMenu.css">
</head>

<body>
<?php
$user = unserialize($_SESSION['usuario']);
  if(!$user)
    header("location:../../index.php");
?>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"><img src="../../resources/icons/icons8-cerveja-80.png" width="30" height="30"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="menu.php">Home <img src="../../resources/icons/icons8-casa-96.png" width="20" height="20"></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Usuários <img src="../../resources/icons/icons8-usuário-masculino-96.png" width="20" height="20">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/View/User/InsereUsuario.php">Adicionar Usuário <img src="../../resources/icons/add.png" width="20" height="20"></a>
              <a class="dropdown-item" href="../../Controller/controller.php?operation=consultar">Consultar Usuários <img src="../../resources/icons/loupe.png" width="20" height="20" alt=""></a>
            </div>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Levas<img src="../../resources/icons/pote-magico.png" width="20" height="20">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/View/User/Levas.php">Cadastrar Levas <img src="../../resources/icons/add.png" width="20" height="20"></a>
              <a class="dropdown-item" href="../../Controller/levaController.php?operation=consultar">Listar Levas <img src="../../resources/icons/lista.png" width="20" height="20"></a>
            </div>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Maltes <img src="../../resources/icons/cevada.png" width="20" height="20">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/View/User/Malte.php">Cadastrar Maltes <img src="../../resources/icons/add.png" width="20" height="20"></a>
              <a class="dropdown-item" href="../../Controller/MalteController.php?operation=consultar">Listar Maltes <img src="../../resources/icons/cerveja.png" width="20" height="20"></a>
            </div>
          <li class="nav-item active">
            <a class="nav-link" href="../../Controller/AutoController.php?operation=logout">Logout <img src="../../resources/icons/logout.png" width="20" height="20"></a>
          </li>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</body>

</html>