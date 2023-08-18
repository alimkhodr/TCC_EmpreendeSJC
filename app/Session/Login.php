<?php

namespace App\Session;

class Login{

//responsavel por iniciar a sessao
private static function init(){
    //verifica status da sessao
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
}

//responsavel por retornar os dados do usuario logado
public static function getUsuarioLogado(){
//inicia a sessao
self::init();

//retorna dados do usuario
return self::isLogged() ? $_SESSION['usuario'] : null;
}

//responsavel por logar o usuario
public static function login($obUsuario){
//inicia a sessao
self::init();

//sessao de usuario
$_SESSION['usuario'] = [
    'id' => $obUsuario->id,
    'nome' => $obUsuario->nome,
    'email' => $obUsuario->email
];

//redireciona usuario para index
header('location: index.php');
exit;
}

    //responsavel por deslogar o usuario
    public static function Logout(){
        //inicia a sessao
        self::init();
    
      //remove a sessao de usuario
      unset($_SESSION['usuario']);

      //redireciona usuario para login
      header('location: login.php');
      exit;

    }

    //responsavel por verificar se o usuario esta logado
    public static function isLogged(){
        //inicia a sessao
        self::init();
        
        //validacao da sessao
         return isset($_SESSION['usuario']['id']);
    }

    //responsavel por obrigar o usuario estar logado p/ acessar
    public static function requireLogin(){
        if(!self::isLogged()){
            header('location: login.php');
            exit;
        }
    }

    //responsavel por obrigar o usuario estar deslogado p/ acessar
    public static function requireLogout(){
        if(self::isLogged()){
            header('location: index.php');
            exit;
        }
    }
}