<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\produto;
use \App\Session\Login;

//obriga o usuario a estar logado
Login::requireLogin();

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: perfil.php?status=error');
  exit;
}

//CONSULTA A produto
$obproduto = produto::getproduto($_GET['id']);

//VALIDAÇÃO DA produto
if(!$obproduto instanceof produto){
  header('location: perfil.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obproduto->excluir();

  header('location: perfil.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';