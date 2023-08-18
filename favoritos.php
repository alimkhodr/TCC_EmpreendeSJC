<?php

require __DIR__.'/vendor/autoload.php';
use \App\Session\Login;
use \App\Entity\produto;


//obriga o usuario a estar logado
Login::requireLogin();

include __DIR__.'/includes/header.php';
