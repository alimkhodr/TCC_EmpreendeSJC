<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar produto');

use \App\Entity\produto;
use \App\Session\Login;

//obriga o usuario a estar logado
Login::requireLogin();

//instancia de produto
$obproduto = new produto;

//VALIDAÇÃO DO POST
if(isset($_POST['img'],$_POST['nome'],$_POST['categoria'],$_POST['preco'])){

  $obproduto->img    = $_POST['img'];
  $obproduto->nome    = $_POST['nome'];
  $obproduto->categoria = $_POST['categoria'];
  $obproduto->preco     = $_POST['preco'];
  $obproduto->cadastrar();

  header('location: perfil.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';