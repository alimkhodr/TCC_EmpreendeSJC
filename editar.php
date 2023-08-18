<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar produto');

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
if(isset($_POST['img'],$_POST['nome'],$_POST['categoria'],$_POST['preco'])){

  $obproduto->img    = $_POST['img'];
  $obproduto->nome    = $_POST['nome'];
  $obproduto->categoria = $_POST['categoria'];
  $obproduto->preco     = $_POST['preco'];
  $obproduto->atualizar();

  header('location: perfil.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';