<?php

require __DIR__.'/vendor/autoload.php';
use \App\Session\Login;
use \App\Entity\produto;


//obriga o usuario a estar logado
Login::requireLogin();
//busca
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

//condições do SQL
$condicoes = [
    strlen($busca) ? 'nome LIKE "%'.str_replace(' ','%',$busca).'%"' : null
];

//clausula where
$where = implode(' AND ',$condicoes);

//obtem os produtos
$produtos = produto::getprodutos($where);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';