<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario{

 /**
   * Identificador único da usuario
   * @var integer
   */
  public $id;

   /**
   * nome do usuario
   * @var string
   */
  public $nome;

 /**
   * email do usuario
   * @var string
   */
  public $email;

   /**
   * hash da senha do usuario
   * @var string
   */
  public $senha;

    /**
   * metodo responsavel por cadastrar um novo usuario no bd
   * @return boolean
   */
  public function cadastrar(){
    //databese
    $obDatabase = new Database('usuarios');

    //insere um novo usuario
    $this->id = $obDatabase->insert([
        'nome' => $this->nome,
        'email' => $this->email,
        'senha' => $this->senha
    ]);

    //sucesso
    return true;
  }
//metodo responsavel por retornar uma instancia de usuario com base em seu email
public static function getUsuarioPorEmail ($email){
    return(new Database('usuarios'))->select('email="'.$email.'"')->fetchObject(self::class);
}

}