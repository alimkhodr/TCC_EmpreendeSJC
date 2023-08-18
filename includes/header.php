<?php

use \App\Session\Login;

//dados do usuario logado
$usuarioLogado = Login::getUsuarioLogado();

//detalhes do usuario
$usuario = $usuarioLogado ?
  $usuarioLogado['nome'] . ' <a href="logout.php" class="text-dark font-weight-bold ml-2">Sair</a>' :
  'Visitante <a href="login.php" class="text-dark font-weight-bold ml-2">Entrar</a>';

?>


<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title>empreendesjc</title>
</head>

<body class="bg-light text-dark">

  <div class="container">

    <div class="jumbotron bg-light text-dark">

      <div class="col-md-4 align-self-center d-none d-md-block">
        <a href="index.php">
          <img src="./app/storage/logo-empreendesjc3.png" class="card-img" alt="...">
      </div>
      </a>
      <hr class="border-dark">
      <div class="d-flex justify-content-start">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
          <?= $usuario ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="favoritos.php">Favoritos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="perfil.php">Meu perfil</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>